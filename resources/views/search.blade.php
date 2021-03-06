<!-- Filter-Form -->
<section id="filter_form2">
    <div class="container">
        <div class="main_bg white-text">
            <h3>Encontre seu carro</h3>
            <div class="row">
                <form id="form_filter" action="{{route('veiculos')}}" method="get">
                    <div class="form-group col-md-3 col-sm-6">
                        <div class="select">
                            <select class="form-control" name="uf">
                                <option value="">Localização</option>
                                <?php foreach($estados as $estado): ?>
                                <option value="<?php echo $estado->uf;?>"><?php echo $estado->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <div class="select">
                            <select class="form-control" id="marca" name="marca">
                                <option value="">Selecione a Marca</option>
                                <?php foreach($marcas as $marca): ?>
                                <option value="<?php echo $marca->name;?>"
                                        data-id="<?php echo $marca->id;?>">
                                    <?php echo $marca->name;?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <div class="select">
                            <select class="form-control" id="modelo" name="modelo">
                                <option value="">Selecione o Modelo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <div class="select">
                            <select class="form-control" name="ano">
                                <option value="">Selecione o Ano</option>
                                <?php foreach($anos as $ano): ?>
                                <option value="<?php echo $ano;?>"><?php echo $ano;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-6">
                        <label class="form-label">Preço Máximo (R$) </label>
                        <input type="text"
                               id="price_range"
                               name="price"
                               class="span2"
                               value="0"
                               data-slider-min="0"
                               data-slider-max="150000"
                               data-slider-step="100"
                               data-slider-value="0">
                    </div>

                    <div class="form-group col-md-3 col-sm-6">
                        <div class="select">
                            <select class="form-control" class="tipo">
                                <option value="">Tipo de Carro</option>
                                <?php foreach($tipos as $tipo): ?>
                                <option value="<?php echo $tipo->name;?>"><?php echo $tipo->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Buscar Carro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /Filter-Form -->