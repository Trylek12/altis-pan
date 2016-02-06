<div id="joueur-info" class="panel panel-default">
    <div class="panel-heading">
        <span style="font-weight: bold;font-size: 20px !important;">Joueurs</span>
    </div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
        <div class="panel-body">
            @include('flash')
            <form action="{{ url('admin/player/'. $player->playerid) }}" method="post">
                <table class="table table-responsive table-striped">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="playerid" value="{{ $player->playerid }}">
                    <tr>
                        <td>Nom du joueur</td>
                        <td>{{ $player->name }}</td>
                    </tr>
                    <tr>
                        <td>Porte-monnaie</td>
                        <td>
                            <?php
                            $money = $player->cash;
                            if ($money < env('MONEY_WARNING', 500000)) {
                                $argent = number_format($money, 2, ',', ' ');
                                echo "<span class='label label-success'>". $argent ." $</span>";
                            } elseif (env('MONEY_DANGER', 5000000) >= $money) {
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
                        <td>Compte Banque</td>
                        <td>
                            <?php
                            $money = $player->bankacc;
                            if ($money < env('MONEY_WARNING', 500000)) {
                                $argent = number_format($money, 2, ',', ' ');
                                echo "<span class='label label-success'>". $argent ." $</span>";
                            } elseif (env('MONEY_DANGER', 5000000) >= $money) {
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
                            <td><a href="{{ route('gang', ['id' => $gang->id ]) }}">{{ $gang->name }}</a></td>
                        </tr>
                    @endif
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Grade Admin</td>
                        <td>
                            <select name="admin" class="form-control"> {{ $player->adminlevel == 0 ? 'selected' : '' }}
                                @foreach($ranks_admin as  $admin)
                                    <option value="{{ $admin->value_associated }}" {{ $player->adminlevel == $admin->value_associated ? 'selected' : '' }}>{{ $admin->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Grade Policier</td>
                        <td>
                            <select name="policier" class="form-control">
                                <option value="0" {{ $player->coplevel == 0 ? 'selected' : '' }}>Non admis</option>
                                @foreach($ranks_cop as $cop)
                                    <option value="{{ $cop->value_associated }}" {{ $player->coplevel == $cop->value_associated ? 'selected' : '' }}>{{ $cop->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Grade Pompier</td>
                        <td>
                            <select name="medic" class="form-control">
                                <option value="0" {{ $player->mediclevel == 0 ? 'selected' : '' }}>Non admis</option>
                                @foreach($ranks_medic as $medic)
                                    <option value="{{ $medic->value_associated }}" {{ $player->mediclevel == $medic->value_associated ? 'selected' : '' }}>{{ $medic->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Grade Donateur</td>
                        <td>
                            <div class="col-md-3">
                                <select name="donator" class="form-control">
                                    <option value="0"{{ $player->donatorlvl == 0 ? 'selected' : '' }}>0</option>
                                    <option value="1"{{ $player->donatorlvl == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2"{{ $player->donatorlvl == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3"{{ $player->donatorlvl == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4"{{ $player->donatorlvl == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5"{{ $player->donatorlvl == 5 ? 'selected' : '' }}>5</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="duredon" placeholder="Nombre de jours" class="form-control" value="{{ $player->duredon }}">
                            </div>

                        </td>
                    </tr>
                </table>

                <hr />

                <label>Inventaire civil</label>
                <pre>{{ $player->civ_gear }}</pre>

                @if($player->coplevel >= 1)
                    <br>
                    <label>Inventaire policier</label>
                    <pre>{{ $player->cop_gear }}</pre>
                @endif

                @if($player->mediclevel >= 1)
                    <br>
                    <label>Inventaire pompier</label>
                    <pre>{{ $player->med_gear }}</pre>
                @endif
                <hr />

                <div class="text-right">
                    <button type="submit" class="btn btn-labeled btn-success">
                        <span class="btn-label"><i class="fa fa-check"></i></span>Valider
                    </button>
                </div>
            </form>

            <form action="{{ url('admin/civ_gear/delete') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="pid" value="{{ $player->playerid }}">

                <button type="submit" class="btn btn-labeled btn-danger" >
                    <span class="btn-label"><i class="fa fa-trash"></i></span>Reset inventaire civil
                </button>
            </form>
        </div>
    </div>
</div>