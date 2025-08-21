<?php

namespace App\DataTables;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClienteDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Cliente> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('tipoDocumento', function(Cliente $row){
                return optional($row->tipoDocumento)->nombre ?? '-';
            })
            ->editColumn('created_at', function($row){
                return $row->created_at ? $row->created_at->format('d/m/Y H:i') : '';
            })
            ->editColumn('updated_at', function($row){
                return $row->updated_at ? $row->updated_at->format('d/m/Y H:i') : '';
            })
            ->addColumn('action', function(Cliente $cliente){
                return '
                    <button class="btn btn-sm btn-dark edit-btn" onclick="editarCliente('.$cliente->id.')" data-id="'.$cliente->id.'">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn" onclick="eliminarCliente('.$cliente->id.')" data-id="'.$cliente->id.'">
                        <i class="bi bi-trash"></i>
                    </button>
                ';
            })
            ->setRowAttr([
                'data-aos'       => 'fade-up',   
                'data-aos-delay' => function ($row) {
                    return $row->id * 50 % 400;
                },
            ])
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Cliente>
     */
    public function query(Cliente $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('tipoDocumento');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('cliente-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->dom('Bftrip')
            ->selectStyleSingle()
            ->addTableClass('table table-striped table-bordered my-custom-datatable') // <-- aquí
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
            Column::make('id')->title('ID'),
            Column::make('nombre')->title('Nombre'),
            Column::make('apellido')->title('Apellido'),
            Column::computed('tipoDocumento')->title('Tipo Documento'),
            Column::make('numeroDocumento')->title('Número Documento'),
            Column::make('telefono')->title('Teléfono'),
            Column::make('direccion')->title('Dirección'),
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
        return 'Cliente_' . date('YmdHis');
    }
}
