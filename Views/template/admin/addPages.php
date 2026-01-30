<?php
use Models\Getter;

$pages = Getter::get("pages", [
    'structure_type' => 'group'
], true);

// Simulation de la récupération de toutes les pages pour la liste de gauche
$allPagesList = Getter::get("pages", [], true); 
?>

<div class="max-w-7xl mx-auto py-12 px-4">
    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-slate-900">Gestion des contenus</h1>
        <p class="text-slate-500 mt-2">Visualisez vos pages existantes ou créez une nouvelle structure.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <div class="lg:col-span-4 space-y-4">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-list-ul text-indigo-500"></i>
                    Pages existantes
                </h2>
                <span class="bg-slate-100 text-slate-600 text-xs font-bold px-2.5 py-1 rounded-full">
                    <?= count($allPagesList) ?>
                </span>
            </div>
            
            <div class="space-y-3 max-h-[600px] overflow-y-auto pr-2 custom-scrollbar">
                <?php foreach ($allPagesList as $p): ?>
                    <div class="group bg-white p-4 rounded-xl border border-slate-200 shadow-sm hover:border-indigo-300 hover:shadow-md transition-all cursor-pointer">
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <span class="font-bold text-slate-900 text-sm group-hover:text-indigo-600 transition-colors">
                                    <?= htmlspecialchars($p['titre'] ?? 'Sans titre') ?>
                                </span>
                                <code class="text-[10px] text-slate-400 mt-1">/<?= ltrim($p['path'], '/') ?></code>
                            </div>
                            <span class="<?= $p['structure_type'] === 'group' ? 'bg-amber-50 text-amber-600 border-amber-100' : 'bg-indigo-50 text-indigo-600 border-indigo-100' ?> border text-[9px] uppercase font-black px-2 py-0.5 rounded">
                                <?= $p['structure_type'] ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="lg:col-span-8">
            <form action="/admin/pages/store" method="POST" id="page-creation-form" class="space-y-8" novalidate>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="relative flex cursor-pointer rounded-xl border bg-white p-5 shadow-sm focus:outline-none border-indigo-200 ring-2 ring-indigo-500" id="option-unique">
                        <input type="radio" name="structure_type" value="unique" class="sr-only" checked>
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-bold text-slate-900">Page Unique</span>
                                <span class="mt-1 flex items-center text-xs text-slate-500 underline">Ex: /a-propos, /contact</span>
                            </span>
                        </span>
                        <i class="fa-solid fa-circle-check text-indigo-600 self-center text-xl"></i>
                    </label>

                    <label class="relative flex cursor-pointer rounded-xl border bg-white p-5 shadow-sm focus:outline-none border-slate-200" id="option-group">
                        <input type="radio" name="structure_type" value="group" class="sr-only">
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-bold text-slate-900">Groupe (Pattern)</span>
                                <span class="mt-1 flex items-center text-xs text-slate-500">Ex: article/[slug]</span>
                            </span>
                        </span>
                        <i class="fa-solid fa-layer-group text-slate-300 self-center text-xl"></i>
                    </label>
                </div>

                <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Titre de la page</label>
                                <input type="text" name="title" id="title" placeholder="Ma superbe page"
                                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                                <p class="error-msg text-red-500 text-xs hidden"></p>
                            </div>

                            <div class="space-y-2" id="route-container">
                                <label id="route-label" class="text-sm font-semibold text-slate-700">Route (Slug)</label>
                                <div class="relative">
                                    <span id="prefix-display" class="absolute left-3 top-2.5 text-slate-400 text-sm">/</span>
                                    <input type="text" id="route-input" name="route" placeholder="ma-page-unique"
                                        class="w-full pl-6 pr-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none transition-all font-mono text-sm">
                                </div>
                                <p class="error-msg text-red-500 text-xs hidden"></p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Description SEO</label>
                            <textarea name="description" id="description" rows="3" placeholder="Une courte description..."
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none transition-all"></textarea>
                            <p class="error-msg text-red-500 text-xs hidden"></p>
                        </div>

                        <div class="pt-4 border-t border-slate-100">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="space-y-1">
                                    <label class="text-sm font-semibold text-slate-700">Appartenance à un groupe</label>
                                    <p class="text-xs text-slate-400">Si choisi, la page sera rangée sous ce préfixe.</p>
                                </div>
                                <select name="parent_group" id="parent_group"
                                    class="min-w-50 px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-indigo-500 outline-none">
                                    <option value="/">Aucun (Racine)</option>
                                    <?php foreach ($pages as $item): ?>
                                        <option value="<?= $item['path'] ?>"><?= $item['path'] ?></option>
                                    <?php endforeach; ?> 
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 px-8 py-4 flex items-center justify-between">
                        <button type="button" class="text-slate-600 font-medium hover:text-slate-800 transition-colors text-sm">Annuler</button>
                        <button type="submit" id="submit-btn" class="flex items-center justify-center bg-indigo-600 text-white px-8 py-2.5 rounded-lg font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all min-w-[180px]">
                            <span id="btn-text">Enregistrer</span>
                            <svg id="btn-spinner" class="hidden animate-spin h-5 w-5 text-white ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>