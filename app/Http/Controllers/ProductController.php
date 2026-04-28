<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cidade;
use App\Models\Produto;
use App\Models\Supermercado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $cidades    = Cidade::all();
        $produtos   = Produto::with('categoria')->paginate(9);

        return view('product.index', compact('categorias', 'cidades', 'produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $produto    = new Produto();

        return view('product.form', compact('produto', 'categorias'));
    }

    public function edit(int $id)
    {
        $produto    = Produto::with('categoria')->findOrFail($id);
        $categorias = Categoria::all();

        return view('product.form', compact('produto', 'categorias'));
    }

    public function show(int $id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);

        return view('product.show', compact('id', 'produto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'        => 'required|string|max:200',
            'fabricante'  => 'nullable|string|max:200',
            'descricao'   => 'nullable|string|max:500',
            'id_categoria'=> 'required|exists:categoria,id',
            'preco'       => 'required',
            'foto'        => 'required|image|mimes:jpg,jpeg|max:2048',
        ], [
            'nome.required'         => 'O nome do produto é obrigatório.',
            'id_categoria.required' => 'A categoria é obrigatória.',
            'preco.required'        => 'O preço é obrigatório.',
            'foto.required'         => 'A foto é obrigatória.',
            'foto.mimes'            => 'A foto deve ser JPG ou JPEG.',
            'foto.max'              => 'A foto deve ter no máximo 2MB.',
        ]);

        $upload = $this->uploadImage($request);

        if (!$upload['status']) {
            return redirect()->route('produto.create')
                ->with('toast', ['type' => 'error', 'message' => $upload['error']]);
        }

        $data          = $request->except(['foto', '_token']);
        $data['foto']  = $upload['file_name'];
        $data['preco'] = currency($data['preco'], true);

        Produto::create($data);

        return redirect()->route('produto.list')
            ->with('toast', ['type' => 'success', 'message' => 'Dados salvos com sucesso!']);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nome'         => 'required|string|max:200',
            'fabricante'   => 'nullable|string|max:200',
            'descricao'    => 'nullable|string|max:500',
            'id_categoria' => 'required|exists:categoria,id',
            'preco'        => 'required',
            'foto'         => 'nullable|image|mimes:jpg,jpeg|max:2048',
        ]);

        $produto = Produto::findOrFail($id);
        $data    = $request->except(['foto', '_token', '_method']);
        $data['preco'] = currency($data['preco'], true);

        if ($request->hasFile('foto')) {
            $upload = $this->uploadImage($request);
            if (!$upload['status']) {
                return redirect()->route('produto.edit', $id)
                    ->with('toast', ['type' => 'error', 'message' => $upload['error']]);
            }
            $data['foto'] = $upload['file_name'];
        }

        $produto->update($data);

        return redirect()->route('produto.show', $id)
            ->with('toast', ['type' => 'success', 'message' => 'Dados salvos com sucesso!']);
    }

    public function destroy(Request $request, int $id = 0)
    {
        $ids = $id ? [$id] : $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('produto.list')
                ->with('toast', ['type' => 'warning', 'message' => 'Nenhum registro foi selecionado!']);
        }

        Produto::whereIn('id', $ids)->delete();

        return redirect()->route('produto.list')
            ->with('toast', ['type' => 'success', 'message' => 'Registro(s) excluído(s) com sucesso!']);
    }

    public function search(Request $request)
    {
        $keyword    = $request->input('search');
        $categorias = Categoria::all();
        $cidades    = Cidade::all();
        $produtos   = Produto::search($keyword);

        return view('product.index', compact('categorias', 'produtos', 'cidades'));
    }

    public function listProduct(Request $request)
    {
        if ($request->ajax()) {
            $produtos = Produto::with('categoria')->orderBy('id', 'desc')->get();

            $data = $produtos->map(fn ($produto) => [
                'id'         => $produto->id,
                'foto'       => '<img class="img-circle img-bordered-sm mr-1" height="35px" width="35px" src="'.asset('storage/img-produtos/'.$produto->foto).'" alt="produto">',
                'nome'       => '<a href="'.route('produto.show', $produto->id).'"><b>'.str($produto->nome)->limit(45).'</b></a>',
                'fabricante' => $produto->fabricante,
                'preco'      => currency($produto->preco),
                'criacao'    => formatDate($produto->created_at, 'd/m/Y H:i'),
            ]);

            return response()->json(['data' => $data]);
        }

        return view('product.list');
    }

    public function description(int $id)
    {
        $produto      = Produto::with('categoria')->findOrFail($id);
        $supermercado = Supermercado::whereHas('produtos', fn ($q) => $q->where('produto_id', $id))->get();

        return view('product.description', [
            'title'        => 'Descrição do Produto',
            'description'  => 'Aqui você pode ver a descrição detalhada do produto.',
            'produto'      => $produto,
            'supermercado' => $supermercado,
        ]);
    }

    private function uploadImage(Request $request): array
    {
        if (!$request->hasFile('foto')) {
            return ['status' => false, 'error' => 'Nenhuma imagem enviada.'];
        }

        $file = $request->file('foto');

        if (!$file->isValid()) {
            return ['status' => false, 'error' => 'Arquivo inválido.'];
        }

        $fileName = $file->getClientOriginalName();
        $file->storeAs('img-produtos', $fileName, 'public');

        return ['status' => true, 'file_name' => $fileName];
    }
}
