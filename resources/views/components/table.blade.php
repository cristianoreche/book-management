<div class="table-wrapper">
    <table class="table" id="livros-table">
        <thead class="table__head">
        <tr class="table__row">
            @foreach ($columns as $column)
                <th class="table__header">{{ $column }}</th>
            @endforeach
            @if ($actions)
                <th class="table__header">Ações</th>
            @endif
        </tr>
        </thead>
        <tbody class="table__body">
        @forelse ($items as $item)
            <tr class="table__row">
                @foreach ($columns as $key => $label)
                    <td class="table__cell">
                        @php
                            $value = match($key) {
                                'valor' => 'R$ ' . number_format($item->valor ?? 0, 2, ',', '.'),
                                'assunto.nome' => $item->assunto->nome ?? '-',
                                'autores' => $item->autores->pluck('nome')->implode(', ') ?: '-',
                                default => data_get($item, $key) ?? '-'
                            };
                        @endphp

                        {{ $value }}
                    </td>
                @endforeach

                @if ($actions)
                    <td class="table__cell table__actions">
                        @php
                            $resource = match (class_basename($item)) {
                                'Livro' => 'livros',
                                'Autor' => 'autores',
                                'Assunto' => 'assuntos',
                                default => '',
                            };
                        @endphp

                        @if (!empty($resource))
                            <div class="action-buttons">
                                <a href="{{ route($resource . '.edit', $item->id) }}"
                                   class="button button--small button--primary"
                                   title="Editar">
                                    Editar
                                </a>

                                <button type="button"
                                        class="button button--small button--danger"
                                        data-toggle="modal"
                                        data-target="confirmationModal-{{ $item->id }}"
                                        title="Excluir">
                                    Excluir
                                </button>
                            </div>

                            <form id="delete-form-{{ $item->id }}"
                                  action="{{ route($resource . '.destroy', $item->id) }}"
                                  method="POST"
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <x-confirmation-modal
                                :itemId="$item->id"
                                :formId="'delete-form-' . $item->id"
                                title="Confirmar Exclusão"
                                message="Tem certeza que deseja excluir este item?"
                                confirmText="Excluir"
                                cancelText="Cancelar" />
                        @endif
                    </td>
                @endif
            </tr>
        @empty
            <tr class="table__row">
                <td colspan="{{ count($columns) + ($actions ? 1 : 0) }}" class="table__cell table__cell--empty">
                    Nenhum registro encontrado.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
