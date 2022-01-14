<?php
namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithConfirmation;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\UserService;
class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

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

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount(Location $location)
    {
        $this->location;
        $this->sortBy            = 'id';
        $this->sortDirection     = 'asc';
        $this->perPage           = 10;
        $this->paginationOptions = [10,25,50,100];
        $this->orderable         = ['id','name','email'];
        $this->columns = ['id','name','email'];
    }

    public function userAdvancedFilter($columns,$filters,$paginate)
    {
        return $this->location->run(function () use ($columns,$filters,$paginate){
           return app()->make(UserService::class)
                       ->advancedFilterWithPagination($columns, $filters, $paginate);
        });
    }

    public function deleteUser($userId)
    {
        return $this->location->run(function () use ($userId){
            return app()->make(UserService::class)
                        ->deleteUser($userId);
         });
    }

    public function deleteSelectedUsers($selectedUsers)
    {
        return $this->location->run(function () use ($selectedUsers){
            return app()->make(UserService::class)
                        ->deleteSelectedUsers($selectedUsers);
         });
    }

    public function render()
    {
        $users = $this->userAdvancedFilter($this->columns,[
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ], $this->perPage)->paginate(10);



        return view('livewire.usertable', compact('users'));
    }

    public function deleteSelected()
    {
       $this->deleteSelectedUsers($this->selected);
       $this->resetSelected();
    }

    public function delete($userId)
    {
        $this->deleteUser($userId);
    }

}