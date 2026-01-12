
import { VisualEditor } from "@boxraiser/visual-editor";
import { Text, HTMLText, Repeater, Row, Select } from "@boxraiser/visual-editor"; // selon ce que tu importes
import components from "./components";

export const editor = new VisualEditor({}); // instance globale

// Enregistrer tous les composants **une seule fois**
editor.registerComponent('hero', {
    title: 'Hero',
    category: 'Banner',
    fields: [
        Text('title', { multiline: false }),
        HTMLText('content'),
        Repeater('buttons', {
            title: 'Boutons',
            addLabel: 'Add a new button',
            fields: [
                Row([
                    Text('label', { label: 'Libellé', default: 'Call to action' }),
                    Text('url', { label: 'Lien' }),
                    Select('type', {
                        default: 'primary',
                        label: 'type',
                        options: [
                            { label: 'Primaire', value: 'primary' },
                            { label: 'Secondaire', value: 'secondary' },
                        ],
                    }),
                ])
            ],
        })
    ],
});


// Si tu as déjà enregistré des composants dans editorSetup
Object.entries(components.components).forEach(([name, config]) => {
    editor.registerComponent(name, config);
});