<?php
namespace App\Http\Livewire\Central;

use App\Http\Livewire\Traits\WithConfirmation;
use App\Http\Livewire\Traits\WithSorting;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use App\Services\AdminService;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Central\Admin;

class AdminTable extends Component
{
    use WithConfirmation;
    use WithPagination;
    use WithSorting {
        sortBy as traitSortBy;
    }
    
    protected $paginationTheme = 'bootstrap';
    public $location;
    public $perPage;
    public $orderable;
    public $search = '';
    public $selected = [];
    public $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {   
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($name,$value)
    {
        if($name === 'perPage' && !in_array($value, $this->paginationOptions))
        {
            $this->perPage = $this->paginationOptions[0];
        }
    }

    public function updatingPerPage()
    {   
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function deleteSelected()
    {
       $this->deleteSelectedUsers($this->selected);
       $this->resetSelected();
    }

    public function delete($adminId)
    {
        $this->deleteUser($adminId);
    }

    public function sortBy($field)
    {
        $this->traitSortBy($field);
        $this->resetPage();
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'asc';
        $this->perPage           = 10;
        $this->paginationOptions = [10,25,50,100];
        $this->orderable         = ['id','name','email'];
        $this->columns = ['id','name','email'];
    }
   
    public function adminAdvancedFilter($columns,$filters,$paginate)
    {
        return app()->make(AdminService::class)
                    ->advancedFilterWithPagination($columns, $filters, $paginate);
    }

    public function deleteAdmin($adminId)
    {
        // return $this->location->run(function () use ($userId){
        //     return app()->make(UserService::class)
        //                 ->deleteUser($userId);
        //  });
    }

    public function deleteSelectedAdmins($selectedAdmins)
    {
        // return $this->location->run(function () use ($selectedUsers){
        //     return app()->make(UserService::class)
        //                 ->deleteSelectedUsers($selectedUsers);
        //  });
    }
    
    public function render()
    {
        $admins = $this->adminAdvancedFilter($this->columns,[
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ], $this->perPage);

        return view('livewire.central.admin-table', compact('admins'));
    }

}