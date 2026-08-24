<x-main-layout>
    <section class="px-6 py-12">
        <div class="mx-auto max-w-7xl">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Table component demo</h1>
                <p class="mt-2 text-gray-600">Deze demo laat zoeken, sorteren, filters, pagination en bulk actions zien. De component is gebouwd met Tailwind-klassen zodat je zelf extra styling kunt toevoegen.</p>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                <?=
                Table::make($users)
                    ->column('name', 'Naam', ['sortable' => true])
                    ->column('email', 'E-mail', ['sortable' => true])
                    ->column('created_at', 'Aangemaakt op', ['sortable' => true, 'format' => function ($value) {
                        return '<span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700">' . e($value) . '</span>';
                    }])
                    ->searchable(['name', 'email'])
                    ->sortable(['name', 'email', 'created_at'])
                    ->filters([
                        ['key' => 'role', 'label' => 'Rol', 'options' => ['admin' => 'Admin', 'editor' => 'Editor', 'viewer' => 'Viewer']],
                    ])
                    ->actions([
                        EditAction::make()->url(function ($item) {
                            return '/table-demo?edit=' . $item['id'];
                        }),
                        DeleteAction::make()->url(function ($item) {
                            return '/table-demo?delete=' . $item['id'];
                        })
                    ])
                    ->perPage(5)
                    ->containerClass('space-y-4')
                    ->toolbarClass('flex flex-col gap-3 rounded-2xl border border-gray-200 bg-gray-50 p-4 shadow-sm md:flex-row md:items-end md:justify-between')
                    ->wrapperClass('overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm')
                    ->tableClass('min-w-full divide-y divide-gray-200')
                    ->theadClass('bg-gray-50')
                    ->thClass('px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500')
                    ->tdClass('px-4 py-3 text-sm text-gray-600')
                    ->buttonClass('inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100')
                    ->searchInputClass('w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:outline-none')
                    ->filterSelectClass('rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm')
                    ->paginationClass('flex flex-col gap-3 border-t border-gray-200 px-4 py-3 sm:flex-row sm:items-center sm:justify-between')
                ?>
            </div>
        </div>
    </section>
</x-main-layout>
