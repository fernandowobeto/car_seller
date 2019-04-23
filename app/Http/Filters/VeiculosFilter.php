<?php

namespace App\Http\Filters;

use App\Http\Filters\FiltersAbstract;
use Illuminate\Support\Collection;
use App\Repositories\Eloquent\Modules\VeiculoRepository;

class VeiculosFilter extends FiltersAbstract
{

    protected $veiculoRepository;

    public function apply(): Collection
    {
        $request = $this->request;

        return $this->veiculoRepository->getVeiculos(function ($db) use ($request) {
            if ($request->has('uf')) {
                //   $db->where('v.id', '=', $request->input('placa'));
            }

        });
    }

    protected function boot()
    {
        $this->veiculoRepository = new VeiculoRepository();
    }

}