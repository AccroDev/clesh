<?php
// Views/admin/add_component.php
$title = "Ajouter un composant";
?>
<div class="max-w-5xl mx-auto my-12 bg-white rounded-xl shadow-2xl border border-slate-200 overflow-hidden">
    <div class="bg-slate-50 p-6 border-b border-slate-200">
        <h2 class="text-xl font-bold text-slate-800">Configuration du Modèle</h2>
    </div>

    <form action="/save" method="POST" class="p-8 space-y-8">
        
        <div class="space-y-5">
            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Nom du projet</label>
                <input type="text" name="name" placeholder="ex: Mon Super Projet" 
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Titre de la page</label>
                <input type="text" name="title" placeholder="ex: Bienvenue sur l'interface" 
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Catégorie</label>
                <input type="text" name="category" placeholder="ex: E-commerce" 
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
            </div>
        </div>

        <hr class="border-slate-200">

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-800 italic">Champs dynamiques</h3>
                <button type="button" id="add-field" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-lg transition-all shadow-md active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                    AJOUTER UN CHAMP
                </button>
            </div>

            <div id="editor-container" class="space-y-3 min-h-[50px] bg-slate-50 p-4 rounded-xl border-2 border-dashed border-slate-200">
                </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-lg shadow-lg hover:shadow-blue-200 transition-all">
                GÉNÉRER LA STRUCTURE
            </button>
        </div>
    </form>
</div>