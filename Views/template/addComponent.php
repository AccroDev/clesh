<?php
// Views/admin/add_component.php
$title = "Ajouter un composant";
?>
<div class="max-w-5xl mx-auto my-12 bg-white rounded-xl shadow-2xl border border-slate-200 overflow-hidden">
    <div class="bg-slate-50 p-6 border-b border-slate-200">
        <h2 class="text-xl font-bold text-slate-800">Configuration du Modèle</h2>
    </div>

    <form action="/admin/components/save" method="POST" class="p-8 space-y-8">
        
        <div class="space-y-5">
            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Nom du composant</label>
                <input type="text" name="name" placeholder="ex: Mon Super Projet" 
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-slate-50/50 transition-all">
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-slate-700 uppercase tracking-wider">Titre du composant</label>
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
                <label class="text-sm font-bold text-slate-700">Définition des champs (JSON)</label>
                <span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-1 rounded font-bold uppercase tracking-widest">Format Visual-Editor</span>
            </div>

            <div class="relative group">
                <div class="absolute -top-3 left-4 px-2 bg-white text-[10px] text-slate-400 font-mono">Exemple de structure</div>
                <pre class="block w-full p-4 pb-1 bg-slate-800 rounded-t-xl text-blue-300 text-xs font-mono leading-relaxed border-x border-t border-slate-700 select-all">
                    [
                        { "type": "text", "name": "subtitle", "label": "Sous-titre" },
                        { "type": "checkbox", "name": "active", "label": "Activer" },
                        { "type": "color", "name": "bg_color", "label": "Couleur de fond" }
                    ]
                </pre>
            </div>

            <textarea 
                name="fields_json" 
                rows="12"
                placeholder='Entrez votre JSON ici...'
                class="w-full p-5 pt-2 bg-slate-50 rounded-b-xl border border-slate-300 font-mono text-sm text-slate-800 focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all shadow-inner border-t-0"
            ></textarea>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-lg shadow-lg hover:shadow-blue-200 transition-all">
                GÉNÉRER LA STRUCTURE
            </button>
        </div>
    </form>
</div>