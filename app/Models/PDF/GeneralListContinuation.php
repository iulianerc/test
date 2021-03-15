<?php


namespace App\Models\PDF;


use Illuminate\Database\Eloquent\Model;

class GeneralListContinuation extends Model
{
    public array $data = [
        'header' => [
            'description' => 'Стальные балоны б/н для заправки газовой смеси:',
            'unit' => 'kg',
            'value' => 'USD'
        ],
        'items' => [
            [
                'name' => 'Балон 5 л No xxxxx Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
            [
                'name' => 'Балон 5 л No xxxxx',
                'count' => 1,
                'weight' => 8.880,
                'value' => 182.30,
                'origin' => 'CN'
            ],
        ]
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->data['count'] = count($this->data['items']);
        $this->data['extendTdCount'] = 31 - $this->data['count'];
        $this->data['totals'] = [
            'pieces' => array_reduce($this->data['items'], function ($acc, $item) {
                    return $acc + $item['count'];
                }),
            'weight' => array_reduce($this->data['items'], function ($acc, $item) {
                    return $acc + $item['count'];
                }),
            'value' => array_reduce($this->data['items'], function ($acc, $item) {
                return $acc + $item['value'];
            })
        ];
    }
}
