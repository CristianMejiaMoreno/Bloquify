<?php

namespace App\DataTables;

use App\Models\Dispositivo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DispositivoDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Dispositivo> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function($row){
                return $row->created_at ? $row->created_at->format('d/m/Y H:i') : '';
            })
            ->editColumn('updated_at', function($row){
                return $row->updated_at ? $row->updated_at->format('d/m/Y H:i') : '';
            })
            ->editColumn('estado_condicion', function($row) {
                $estado = ucfirst($row->estado_condicion);

                $class = match($row->estado_condicion){
                    'nuevo' => 'success',
                    'usado'=>'warning',
                    'reacondicionado'=> 'info'
                };

                return '<span class="badge bg-'. $class .'">'. $estado .'</span>';
            })
            ->editColumn('estado_uso', function($row){
                $estado = ucfirst($row->estado_uso);

                $class = match($row->estado_uso){
                    'disponible'=> 'success',
                    'asignado'=> 'info', 
                    'bloqueado'=> 'danger',
                    'mantenimiento'=> 'warning'
                };
                
                return '<span class="badge bg-'. $class .'">'. $estado .'</span>';
            })
            ->addColumn('action', function(Dispositivo $dispositivo){
                return '
                    <button class="btn btn-sm btn-dark edit-btn" onclick="('.$dispositivo->id.')" data-id="'.$dispositivo->id.'">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn" onclick="eliminarCliente('.$dispositivo->id.')" data-id="'.$dispositivo->id.'">
                        <i class="bi bi-trash"></i>
                    </button>
                ';
            })
            ->addColumn('foto_url', function(Dispositivo $dispositivo){
                
                if($dispositivo->foto_url){

                    $url = asset('storage/'.$dispositivo->foto_url);

                    return '<img
                        src="'.$url.'"
                        width="50" height="50"
                        style="cursor:pointer"
                        onclick="mostrarImagen(\''.$url.'\')"   
                    >';
                }
            })
            ->setRowAttr([
                'data-aos' => 'fade-up',   
                'data-aos-delay' => function ($row) {
                    return $row->id * 50 % 400;
                },
            ])
            ->rawColumns(['action', 'estado_condicion', 'estado_uso', 'foto_url'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Dispositivo>
     */
    public function query(Dispositivo $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('dispositivo-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->responsive(true) 
                    ->scrollX(true)   
                    ->orderBy(1)
                    ->dom('Bftrip')
                    ->selectStyleSingle()
                    ->addTableClass('table table-striped table-bordered my-custom-datatable')
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }


    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('imei')->title('IMEI'),
            Column::make('marca')->title('Marca'),
            Column::make('modelo')->title('Modelo'),
            Column::make('numero_serie')->title('Numero de serie'),
            Column::make('estado_condicion')->title('Condicion'),
            Column::make('estado_uso')->title('Estado'),
            Column::make('foto_url')->title('Foto'),
            Column::make('observaciones')->title('Observacion'),
            Column::make('created_at')->title('Creado'),
            Column::make('updated_at')->title('Actualizado'),
            Column::computed('action')
                ->title('Acciones')
                ->exportable(false)
                ->printable(false)
                ->width(90)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Dispositivo_' . date('YmdHis');
    }
}
