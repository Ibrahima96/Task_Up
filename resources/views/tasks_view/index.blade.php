@extends('base')
<!-- Tableau -->
@section('content')
    <div class="flex justify-between">
        <a href="{{route('task.create')}}" class="bg-gray-400/15 hover:bg-gray-400/10 rounded  py-2 px-4">Ajouter une
            tache</a>
        <a href="{{route('login')}}" class=" hover:bg-gray-400/10 rounded underline  py-2 px-4">Se déconnecter</a>
    </div>
    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Description</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Action</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @forelse($tasks as $task)
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $task->title }}</td>
                    <td class="px-6 py-4">{{ $task->description }}</td>
                    <td class="px-6 py-4">
                        @if($task->status === 'Terminé')
                            <span
                                class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Terminé</span>
                        @elseif($task->status === 'En cours')
                            <span
                                class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En cours</span>
                        @else
                            <span
                                class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ $task->status }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('task.edit',$task->id)}}"
                           class="text-blue-600 hover:underline mr-3">Modifier</a>
                        <form action="{{route('task.destroy',$task->id)}}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline cursor-pointer"
                                    onclick="return confirm('Etes vous sure de vouloir supprimer la tache')">Supprimer
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>

                    <td colspan="4" class="text-center py-4 text-gray-500">Aucune tâche enregistrée.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
