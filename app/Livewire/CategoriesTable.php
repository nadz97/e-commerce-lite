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

    public function actions(Category $row): array
    {
        return [
            Button::add('delete')
                ->slot('Delete: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
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
