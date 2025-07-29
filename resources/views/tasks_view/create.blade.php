@extends('base')
@section('content')
    <form action="{{ isset($task) ? route('task.update', $task->id) : route('task.store') }}" method="POST">
        <h2 class="mb-8 font-light text-3xl">{{ isset($task) ? 'Modifier une Tâche' : 'Ajouter une Tâche' }}</h2>

        @csrf
        @if(isset($task))
            @method('PUT')
        @endif

        <!-- Champ Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title" placeholder="Entrez un titre"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('title', $task->title ?? '') }}">
        </div>

        <!-- Champ Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" placeholder="Entrez une description"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description ?? '') }}</textarea>
        </div>

        <!-- Champ Status -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
            <select name="status" id="status"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Choisir un statut --</option>
                <option value="En attente" @selected(($task->status ?? '') === "En attente")>En attente</option>
                <option value="En cours" @selected(($task->status ?? '') === "En cours")>En cours</option>
                <option value="Terminé" @selected(($task->status ?? '') === "Terminé")>Terminé</option>
            </select>
        </div>

        <!-- Bouton Soumettre -->
        <div>
            <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition cursor-pointer">
                {{ isset($task) ? "Modifier" : "➕ Ajouter" }}
            </button>
        </div>
    </form>
@endsection
