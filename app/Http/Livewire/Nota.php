<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nota as Model;


class Nota extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $titulo;
    public $contenido;


    public $mode = 'create';

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;

    protected $rules = [
        'titulo' => 'required',
        'contenido' => 'required',

    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $model = Model::where('titulo', 'like', '%' . $this->search . '%')->orWhere('contenido', 'like', '%' . $this->search . '%')->latest()->paginate($this->paginate);
        return view('livewire.nota', [
            'rows' => $model
        ]);
    }


    public function create()
    {
        $this->mode = 'create';
        $this->resetForm();
        $this->showForm = true;
    }


    public function edit($primaryId)
    {
        $this->mode = 'update';
        $this->primaryId = $primaryId;
        $model = Model::find($primaryId);

        $this->titulo = $model->titulo;
        $this->contenido = $model->contenido;



        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
    }

    public function store()
    {
        $this->validate();

        $model = new Model();

        $model->titulo = $this->titulo;
        $model->contenido = $this->contenido;
        $model->save();

        $this->resetForm();
        session()->flash('message', 'Nota guardada exitósamente');
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->titulo = "";
        $this->contenido = "";
    }


    public function update()
    {
        $this->validate();

        $model = Model::find($this->primaryId);

        $model->titulo = $this->titulo;
        $model->contenido = $this->contenido;
        $model->save();

        $this->resetForm();

        $this->showForm = false;

        session()->flash('message', 'Nota actualizada exitósamente');
    }

    public function confirmDelete($primaryId)
    {
        $this->primaryId = $primaryId;
        $this->showConfirmDeletePopup = true;
    }

    public function destroy()
    {
        Model::find($this->primaryId)->delete();
        $this->showConfirmDeletePopup = false;
        session()->flash('message', 'Nota eliminada exitósamente');
    }

    public function clearFlash()
    {
        session()->forget('message');
    }
}
