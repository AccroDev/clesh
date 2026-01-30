<?php

use Models\Getter;

$title = "Ajouter un composant"; 
$existingComponents = Getter::get("composant", [], true);
?>

<div class="max-w-[1400px] mx-auto my-12 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        <div class="lg:col-span-4 space-y-6 order-2 lg:order-1">
            <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
                <div class="bg-slate-50 p-4 border-b border-slate-200 flex justify-between items-center">
                    <h3 class="font-bold text-slate-700 flex items-center gap-2">
                        <i class="fa-solid fa-cubes text-blue-500"></i>
                        Composants actifs
                    </h3>
                    <span class="text-xs bg-blue-100 text-blue-600 font-bold px-2 py-1 rounded-full">
                        <?= count($existingComponents) ?>
                    </span>
                </div>

                <div class="p-4 max-h-[700px] overflow-y-auto custom-scrollbar space-y-4">
                    <?php if (empty($existingComponents)): ?>
                        <p class="text-sm text-slate-400 text-center py-10">Aucun composant enregistré.</p>
                    <?php else: ?>
                        <?php foreach ($existingComponents as $comp): ?>
                            <div class="group p-4 rounded-lg border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-blue-300 hover:shadow-sm transition-all cursor-default">
                                <div class="flex justify-between items-start mb-1">
                                    <span class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors">
                                        <small>name : </small><?= htmlspecialchars($comp['name']) ?>
                                    </span>
                                    <span class="text-[9px] px-1.5 py-0.5 rounded bg-slate-200 text-slate-600 font-bold uppercase">
                                        <?= htmlspecialchars($comp['category'] ?? 'Général') ?>
                                    </span>
                                </div>
                                <p class="text-xs text-slate-500 italic line-clamp-1"><small>categ: </small> <?= htmlspecialchars($comp['title']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="lg:col-span-8 order-1 lg:order-2">
            <div class="bg-white rounded-xl shadow-2xl border border-slate-200 overflow-hidden">
                <div class="bg-slate-50 p-6 border-b border-slate-200">
                    <h2 class="text-xl font-bold text-slate-800">Configuration du Modèle</h2>
                </div>

                <form action="/admin/components/save" method="POST" class="p-8 space-y-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Nom du composant</label>
                            <input type="text" name="name" placeholder="ex: hero_banner"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Catégorie</label>
                            <input type="text" name="category" placeholder="ex: E-commerce"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
                        </div>

                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Titre affiché (Label)</label>
                            <input type="text" name="title" placeholder="ex: Bannière d'accueil avec bouton"
                                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
                        </div>
                    </div>

                    <hr class="border-slate-200">

                    <?php require("Views/template/admin/ComponentsFieldSet.php"); ?>

                    <div class="flex justify-between items-center pt-4">
                        <button type="button" class="text-slate-400 hover:text-slate-600 font-medium text-sm transition-colors">Vider les champs</button>
                        <button type="submit" class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-lg shadow-lg hover:shadow-blue-200 transition-all uppercase tracking-widest text-sm">
                            Générer le composant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>