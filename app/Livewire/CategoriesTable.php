<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CategoriesTable extends PowerGridComponent
{
    public string $tableName = 'categories-table-6yzhdb-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Category::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('name_lower', fn(Category $model) => strtolower(e($model->name)))
            ->add('created_at')
            ->add('created_at_formatted', fn(Category $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->searchable()
                ->sortable()
                ->editOnClick(),

            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->searchable(),

            Column::action('Action')
        ];
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::inputText('name'),
    //         Filter::datepicker('created_at_formatted', 'created_at'),
    //     ];
    // }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        // Define validation rules for each field
        $rules = [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];

        // Get the rule for the specific field
        $fieldRule = $rules[$field] ?? ['string', 'max:255'];

        // Validate using the value directly
        $validator = \Illuminate\Support\Facades\Validator::make(
            [$field => $value],
            [$field => $fieldRule]
        );

        if ($validator->fails()) {
            $this->dispatch('showError', $validator->errors()->first($field));
            return;
        }

        // Update with validated and escaped data
        Category::query()->find($id)->update([
            $field => e($value),
        ]);

        // Optional: refresh the table
        $this->dispatch('pg:eventRefresh-default');
    }

    protected function getListeners()
    {
        return [
            'delete' => 'deleteCategory',
        ];
    }

    public function deleteCategory($rowId)
    {
        Category::find($rowId)->delete();

        $this->dispatch('pg:eventRefresh-default');
    }

    #[On('delete')]
    public function delete($rowId)
    {
        $category = Category::find($rowId);

        if ($category) {
            $category->delete();

            session()->flash('flash', [
                'message' => 'Category deleted successfully!',
                'type' => 'success'
            ]);
        } else {
            session()->flash('flash', [
                'message' => 'Category not found!',
                'type' => 'error'
            ]);
        }
    }

    public function actions(Category $row): array
    {
        return [
            Button::add('delete')
                ->slot('
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-red-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    ')
                ->id()
                ->class('flex items-center justify-center w-9 h-9 rounded-full bg-white/10 border border-white/20 shadow-popout hover:shadow-insetpop hover:bg-white/20 transition-all duration-200')
                ->dispatch('delete', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules(Category $row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
