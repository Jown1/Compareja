<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            ['nome' => 'Smartphone',            'fabricante' => 'Samsung',        'descricao' => 'Smartphone com tela de 6 polegadas',              'id_categoria' => 1,  'foto' => 'smartphone.jpg',            'preco' => 1500.00],
            ['nome' => 'Sofá',                  'fabricante' => 'IKEA',           'descricao' => 'Sofá confortável de 3 lugares',                   'id_categoria' => 2,  'foto' => 'sofa.jpg',                  'preco' => 1200.00],
            ['nome' => 'Camiseta',              'fabricante' => 'Nike',           'descricao' => 'Camiseta esportiva de algodão',                   'id_categoria' => 3,  'foto' => 'camiseta.jpg',              'preco' => 80.00],
            ['nome' => 'Boneca',                'fabricante' => 'Mattel',         'descricao' => 'Boneca Barbie com acessórios',                    'id_categoria' => 4,  'foto' => 'boneca.jpg',                'preco' => 150.00],
            ['nome' => 'Bola de Futebol',       'fabricante' => 'Adidas',         'descricao' => 'Bola de futebol oficial da Copa do Mundo',        'id_categoria' => 5,  'foto' => 'bola_futebol.jpg',          'preco' => 200.00],
            ['nome' => 'Livro de Receitas',     'fabricante' => 'Editora Abril',  'descricao' => 'Livro com receitas deliciosas',                   'id_categoria' => 6,  'foto' => 'livro_receitas.jpg',        'preco' => 50.00],
            ['nome' => 'Furadeira',             'fabricante' => 'Bosch',          'descricao' => 'Furadeira elétrica com acessórios',               'id_categoria' => 7,  'foto' => 'furadeira.jpg',             'preco' => 300.00],
            ['nome' => 'Carro Sedan',           'fabricante' => 'Toyota',         'descricao' => 'Carro sedan com motor potente',                   'id_categoria' => 8,  'foto' => 'carro_sedan.jpg',           'preco' => 80000.00],
            ['nome' => 'Apartamento',           'fabricante' => '',               'descricao' => 'Apartamento com 2 quartos e varanda',             'id_categoria' => 9,  'foto' => 'apartamento.jpg',           'preco' => 300000.00],
            ['nome' => 'Perfume',               'fabricante' => 'Chanel',         'descricao' => 'Perfume feminino de luxo',                        'id_categoria' => 10, 'foto' => 'perfume.jpg',               'preco' => 400.00],
            ['nome' => 'Cesta de Café da Manhã','fabricante' => 'Nattus',         'descricao' => 'Uma cesta com vários alimentos',                  'id_categoria' => 11, 'foto' => 'cesta_cafe_manha.jpg',      'preco' => 120.00],
            ['nome' => 'Relógio de Pulso',      'fabricante' => 'Rolex',          'descricao' => 'Relógio de pulso de luxo',                        'id_categoria' => 12, 'foto' => 'relogio_pulso.jpg',         'preco' => 25000.00],
            ['nome' => 'Guitarra Elétrica',     'fabricante' => 'Fender',         'descricao' => 'Guitarra elétrica com amplificador',              'id_categoria' => 13, 'foto' => 'guitarra_eletrica.jpg',     'preco' => 5000.00],
            ['nome' => 'Carrinho de Bebê',      'fabricante' => 'Graco',          'descricao' => 'Carrinho de bebê confortável e seguro',           'id_categoria' => 14, 'foto' => 'carrinho_bebe.jpg',         'preco' => 800.00],
            ['nome' => 'Ração para Cães',       'fabricante' => 'Pedigree',       'descricao' => 'Ração premium para cães adultos',                 'id_categoria' => 15, 'foto' => 'racao_caes.jpg',            'preco' => 150.00],
            ['nome' => 'Detergente Líquido',    'fabricante' => 'Ypê',            'descricao' => 'Detergente líquido para louças',                  'id_categoria' => 16, 'foto' => 'detergente_liquido.jpg',    'preco' => 10.00],
            ['nome' => 'Creme Hidratante',      'fabricante' => 'Nivea',          'descricao' => 'Creme hidratante para pele seca',                 'id_categoria' => 17, 'foto' => 'hidratante.jpg',            'preco' => 25.00],
            ['nome' => 'Impressora Multifuncional','fabricante' => 'HP',          'descricao' => 'Impressora multifuncional com scanner',           'id_categoria' => 18, 'foto' => 'impressora_multifuncional.jpg','preco' => 600.00],
            ['nome' => 'Papel A4',              'fabricante' => 'Chamex',         'descricao' => 'Papel A4 para impressão e escrita',               'id_categoria' => 19, 'foto' => 'papel_a4.jpg',              'preco' => 20.00],
            ['nome' => 'Cadeira de Escritório', 'fabricante' => 'Flexform',       'descricao' => 'Cadeira ergonômica para escritório',              'id_categoria' => 18, 'foto' => 'cadeira_escritorio.jpg',    'preco' => 700.00],
            ['nome' => 'Mesa de Jantar',        'fabricante' => 'Tok&Stok',       'descricao' => 'Mesa de jantar para 6 pessoas',                   'id_categoria' => 2,  'foto' => 'mesa_jantar.jpg',           'preco' => 1500.00],
            ['nome' => 'Cama de Casal',         'fabricante' => 'Ortobom',        'descricao' => 'Cama de casal com colchão incluso',               'id_categoria' => 2,  'foto' => 'cama_casal.jpg',            'preco' => 2000.00],
            ['nome' => 'Geladeira',             'fabricante' => 'Brastemp',       'descricao' => 'Geladeira frost free com freezer',                'id_categoria' => 1,  'foto' => 'geladeira.jpg',             'preco' => 3000.00],
            ['nome' => 'Fogão',                 'fabricante' => 'Consul',         'descricao' => 'Fogão 4 bocas com acendimento automático',        'id_categoria' => 1,  'foto' => 'fogao.jpg',                 'preco' => 1200.00],
            ['nome' => 'Micro-ondas',           'fabricante' => 'Electrolux',     'descricao' => 'Micro-ondas com grill',                           'id_categoria' => 1,  'foto' => 'micro_ondas.jpg',           'preco' => 800.00],
            ['nome' => 'Máquina de Lavar',      'fabricante' => 'LG',             'descricao' => 'Máquina de lavar roupas 10kg',                    'id_categoria' => 1,  'foto' => 'maquina_lavar.jpg',         'preco' => 2500.00],
            ['nome' => 'Secadora de Roupas',    'fabricante' => 'Samsung',        'descricao' => 'Secadora de roupas com tecnologia inverter',      'id_categoria' => 1,  'foto' => 'secadora_roupas.jpg',       'preco' => 3000.00],
            ['nome' => 'Aspirador de Pó',       'fabricante' => 'Philips',        'descricao' => 'Aspirador de pó portátil',                        'id_categoria' => 16, 'foto' => 'aspirador_po.jpg',          'preco' => 400.00],
            ['nome' => 'Liquidificador',        'fabricante' => 'Arno',           'descricao' => 'Liquidificador com 5 velocidades',                'id_categoria' => 1,  'foto' => 'liquidificador.jpg',        'preco' => 150.00],
            ['nome' => 'Batedeira',             'fabricante' => 'Mondial',        'descricao' => 'Batedeira planetária com 3 batedores',            'id_categoria' => 1,  'foto' => 'batedeira.jpg',             'preco' => 250.00],
            ['nome' => 'Ferro de Passar',       'fabricante' => 'Black+Decker',   'descricao' => 'Ferro de passar roupas a vapor',                  'id_categoria' => 17, 'foto' => 'ferro_passar.jpg',          'preco' => 120.00],
            ['nome' => 'Ventilador',            'fabricante' => 'Britânia',       'descricao' => 'Ventilador de mesa com 3 velocidades',            'id_categoria' => 1,  'foto' => 'ventilador.jpg',            'preco' => 200.00],
            ['nome' => 'Ar Condicionado',       'fabricante' => 'Springer',       'descricao' => 'Ar condicionado split 12000 BTUs',                'id_categoria' => 1,  'foto' => 'ar_condicionado.jpg',       'preco' => 2500.00],
            ['nome' => 'Aquecedor',             'fabricante' => 'Cadence',        'descricao' => 'Aquecedor elétrico portátil',                     'id_categoria' => 1,  'foto' => 'aquecedor.jpg',             'preco' => 300.00],
            ['nome' => 'Umidificador de Ar',    'fabricante' => 'G-Tech',         'descricao' => 'Umidificador de ar ultrassônico',                 'id_categoria' => 1,  'foto' => 'umidificador_ar.jpg',       'preco' => 200.00],
        ];

        foreach ($produtos as &$p) {
            $p['created_at'] = now();
            $p['updated_at'] = now();
        }

        DB::table('produto')->insert($produtos);
    }
}
