export function adminAddComponents() {
    let fieldIndex = 0;

    document.getElementById('add-field').addEventListener('click', () => {
        const container = document.getElementById('editor-container');

        const row = document.createElement('div');
        row.className = "grid grid-cols-12 gap-3 bg-white p-3 rounded-lg border border-slate-300 shadow-sm group items-center animate-in slide-in-from-left-4 duration-200";

        row.innerHTML = `
            <div class="col-span-3">
                <select name="fields[${fieldIndex}][type]" class="w-full p-2 text-sm border border-slate-200 rounded bg-slate-50 outline-none focus:border-blue-500">
                    <option value="text">Texte</option>
                    <option value="number">Nombre</option>
                    <option value="date">Date</option>
                    <option value="image">Image</option>
                </select>
            </div>

            <div class="col-span-4">
                <input type="text" name="fields[${fieldIndex}][name]" placeholder="Nom du champ (slug)" 
                    class="w-full p-2 text-sm border border-slate-200 rounded outline-none focus:border-blue-500">
            </div>

            <div class="col-span-4">
                <select name="fields[${fieldIndex}][multiline]" class="w-full p-2 text-sm border border-slate-200 rounded bg-slate-50 outline-none focus:border-blue-500">
                    <option value="0">Ligne simple (Input)</option>
                    <option value="1">Multi-ligne (Textarea)</option>
                </select>
            </div>

            <div class="col-span-1 flex justify-end">
                <button type="button" class="p-2 text-slate-400 hover:text-red-500 transition-colors" onclick="this.closest('.grid').remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `;

        container.appendChild(row);
        fieldIndex++;
    });
}