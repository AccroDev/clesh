<!-- <div class="space-y-4">
    <div class="flex items-center justify-between">
        <label class="text-sm font-bold text-slate-700">Définition des champs (JSON)</label>
        <span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-1 rounded font-bold uppercase tracking-widest">Format Visual-Editor</span>
    </div>

    <div class="relative">
        <div class="absolute -top-3 left-4 px-2 bg-white text-[10px] text-slate-400 font-mono z-10">Exemple de structure</div>
        <pre class="block w-full p-4 pb-2 bg-slate-800 rounded-t-xl text-blue-300 text-[11px] font-mono leading-relaxed border-x border-t border-slate-700 select-all overflow-x-auto">
[
{ "type": "text", "name": "subtitle", "label": "Sous-titre" },
{ "type": "image", "name": "cover", "label": "Image de fond" }
]</pre>
        <textarea
            name="fields_json"
            rows="10"
            placeholder='Entrez votre JSON ici...'
            class="w-full p-5 pt-4 bg-slate-900 rounded-b-xl border border-slate-700 font-mono text-sm text-blue-100 focus:ring-2 focus:ring-blue-500 outline-none transition-all shadow-inner"></textarea>
    </div>
</div> -->

<div class="space-y-6" id="schema-builder-root">
    <div class="flex items-center justify-between">
        <div>
            <label class="text-sm font-bold text-slate-700">Configuration des champs</label>
            <p class="text-xs text-slate-400">Construisez votre interface visuellement</p>
        </div>
        <button type="button" id="add-field-btn" 
            class="flex items-center gap-2 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-lg text-xs font-bold transition-all border border-indigo-200">
            <i class="fa-solid fa-plus"></i> AJOUTER UN CHAMP
        </button>
    </div>

    <div id="fields-container" class="space-y-3">
        </div>

    <textarea name="fields_json" id="final-json-output" class="hidden"></textarea>
    
    <div class="mt-4 p-3 bg-slate-900 rounded-lg hidden" id="json-preview-container">
        <pre class="text-[10px] text-blue-300 font-mono" id="json-preview-text">[]</pre>
    </div>
</div>

<div id="type-modal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <div class="p-4 border-b bg-slate-50 flex justify-between items-center">
            <span class="font-bold text-slate-700">Choisir un type de champ</span>
            <button type="button" onclick="closeTypeModal()" class="text-slate-400 hover:text-slate-600">✕</button>
        </div>
        <div class="p-4 grid grid-cols-2 gap-2 max-h-[400px] overflow-y-auto" id="type-grid">
            </div>
    </div>
</div>