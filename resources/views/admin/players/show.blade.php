@extends('admin.app')

@section('page-info')
    <h3>{{ $player->name }}</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div id="joueur-info" class="panel panel-default">
                    <div class="panel-heading"><span style="font-weight: bold;font-size: 20px !important;">Joueurs</span>
                        <a href="#" data-tool="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                            <em class="fa fa-minus"></em>
                        </a>
                    </div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <table class="table table-responsive table-striped">
                                <tr>
                                    <td>Nom du joueur</td>
                                    <td>{{ $player->name }}</td>
                                </tr>
                                <tr>
                                    <td>Portes-monnaie</td>
                                    <td>
                                        <?php
                                            $money = $player->cash;

                                            if ($money < 500000) {
                                                $argent = number_format($money, 2, ',', ' ');
                                                echo "<span class='label label-success'>". $argent ." $</span>";
                                            } elseif (800000 > $money) {
                                                $argent = number_format($money, 2, ',', ' ');
                                                echo "<span class='label label-warning'>". $argent ." $</span>";
                                            } else {
                                                $argent = number_format($money, 2, ',', ' ');
                                                echo "<span class='label label-danger'>". $argent ." $</span>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Banque</td>
                                    <td>
                                        <?php
                                        $money = $player->bankacc;

                                        if ($money < 500000) {
                                            $argent = number_format($money, 2, ',', ' ');
                                            echo "<span class='label label-success'>". $argent ." $</span>";
                                        } elseif (800000 > $money) {
                                            $argent = number_format($money, 2, ',', ' ');
                                            echo "<span class='label label-warning'>". $argent ." $</span>";
                                        } else {
                                            $argent = number_format($money, 2, ',', ' ');
                                            echo "<span class='label label-danger'>". $argent ." $</span>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                @if($gang)
                                <tr>
                                    <td>Gang</td>
                                    <td>{{ $gang->name }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Grade Admin</td>
                                    <td>
                                        <select name="admin" class="form-control">
                                            <option value="0"{{ $player->adminlevel == 0 ? 'selected' : '' }}>0</option>
                                            <option value="1"{{ $player->adminlevel == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2"{{ $player->adminlevel == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3"{{ $player->adminlevel == 3 ? 'selected' : '' }}>3</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade Policier</td>
                                    <td>
                                        <select name="policier" class="form-control">
                                            <option value="1"{{ $player->coplevel == 1 ? 'selected' : '' }}>{{ env('POLICE_GRADE_1') }}</option>
                                            <option value="2"{{ $player->coplevel == 2 ? 'selected' : '' }}>{{ env('POLICE_GRADE_2') }}</option>
                                            <option value="3"{{ $player->coplevel == 3 ? 'selected' : '' }}>{{ env('POLICE_GRADE_3') }}</option>
                                            <option value="4"{{ $player->coplevel == 4 ? 'selected' : '' }}>{{ env('POLICE_GRADE_4') }}</option>
                                            <option value="5"{{ $player->coplevel == 5 ? 'selected' : '' }}>{{ env('POLICE_GRADE_5') }}</option>
                                            <option value="6"{{ $player->coplevel == 6 ? 'selected' : '' }}>{{ env('POLICE_GRADE_6') }}</option>
                                            <option value="7"{{ $player->coplevel == 7 ? 'selected' : '' }}>{{ env('POLICE_GRADE_7') }}</option>
                                            <option value="8"{{ $player->coplevel == 8 ? 'selected' : '' }}>{{ env('POLICE_GRADE_8') }}</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade Pompier</td>
                                    <td>
                                        <select name="medic" class="form-control">
                                            <option value="1"{{ $player->mediclevel == 1 ? 'selected' : '' }}>{{ env('POMPIER_GRADE_1') }}</option>
                                            <option value="2"{{ $player->mediclevel == 2 ? 'selected' : '' }}>{{ env('POMPIER_GRADE_2') }}</option>
                                            <option value="3"{{ $player->mediclevel == 3 ? 'selected' : '' }}>{{ env('POMPIER_GRADE_3') }}</option>
                                            <option value="4"{{ $player->mediclevel == 4 ? 'selected' : '' }}>{{ env('POMPIER_GRADE_4') }}</option>
                                            <option value="5"{{ $player->mediclevel == 5 ? 'selected' : '' }}>{{ env('POMPIER_GRADE_5') }}</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grade Donateur</td>
                                    <td>
                                        <select name="donator" class="form-control">
                                            <option value="0"{{ $player->donatorlvl == 0 ? 'selected' : '' }}>0</option>
                                            <option value="1"{{ $player->donatorlvl == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2"{{ $player->donatorlvl == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3"{{ $player->donatorlvl == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4"{{ $player->donatorlvl == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5"{{ $player->donatorlvl == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <hr />

                            <label>Inventaire civil</label>
                            <pre>{{ $player->civ_gear }}</pre>

                            <hr />

                            <div class="text-right">
                                <a href="" class="btn btn-success"><i class="fa fa-check"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="véhicules" class="panel panel-default">
                    <div class="panel-heading"><span style="font-weight: bold;font-size: 20px !important;">Véhicules</span>
                        <a href="#" data-tool="panel-collapse" data-toggle="tooltip" title="" class="pull-right">
                            <em class="fa fa-minus"></em>
                        </a>
                    </div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group">
                                <div class="panel panel-default">
                                    <div id="headingOne" role="tab" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">Terrestre</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <table class="table table-striped table-responsive">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Coté</th>
                                                    <th>Type</th>
                                                    <th>Active</th>
                                                </tr>
                                                @foreach($vehicles_car as $vehicle_car)
                                                    <tr>
                                                        <td>{!! $vehicle_car->classname !!}</td>
                                                        <td>{!! $vehicle_car->side !!}</td>
                                                        <td>{!! $vehicle_car->type !!}</td>
                                                        <td>
                                                            @if($vehicle_car->active == 1)
                                                                <i class="fa fa-check" style="color: #2cc36b;"></i>
                                                            @elseif($vehicle_car->active == 0)
                                                                <i class="fa fa-close" style="color: #c0392b;"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div id="headingTwo" role="tab" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">Aérien</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <table class="table table-striped table-responsive">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Coté</th>
                                                    <th>Type</th>
                                                    <th>Active</th>
                                                </tr>
                                                @foreach($vehicles_air as $vehicle_air)
                                                    <tr>
                                                        <td>{!! $vehicle_air->classname !!}</td>
                                                        <td>{!! $vehicle_air->side !!}</td>
                                                        <td>{!! $vehicle_air->type !!}</td>
                                                        <td>
                                                            @if($vehicle_air->active == 1)
                                                                <i class="fa fa-check" style="color: #2cc36b;"></i>
                                                            @elseif($vehicle_air->active == 0)
                                                                <i class="fa fa-close" style="color: #c0392b;"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div id="headingThree" role="tab" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">Aquatique</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <table class="table table-striped table-responsive">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Coté</th>
                                                    <th>Type</th>
                                                    <th>Active</th>
                                                </tr>
                                                @foreach($vehicles_ship as $vehicle_ship)
                                                    <tr>
                                                        <td>{!! $vehicle_ship->classname !!}</td>
                                                        <td>{!! $vehicle_ship->side !!}</td>
                                                        <td>{!! $vehicle_ship->type !!}</td>
                                                        <td>
                                                            @if($vehicle_ship->active == 1)
                                                                <i class="fa fa-check" style="color: #2cc36b;"></i>
                                                            @elseif($vehicle_ship->active == 0)
                                                                <i class="fa fa-close" style="color: #c0392b;"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection