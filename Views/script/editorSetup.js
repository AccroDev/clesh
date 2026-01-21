import {
    VisualEditor,
    Text,
    HTMLText,
    Select,
    Checkbox,
    Color,
    Number,
    Range,
    ImageUrl,
    DatePicker,
    Repeater,
    Row,
    Tabs,
    Alignment,
    TextAlign
} from "@boxraiser/visual-editor";

export const editor = new VisualEditor({});

const FIELD_MAP = {
    'Text': Text,
    'HTMLText': HTMLText,
    'Select': Select,
    'Checkbox': Checkbox,
    'Color': Color,
    'Repeater': Repeater,
    'Row': Row,
    'Number': Number,
    'Range': Range,
    'ImageUrl': ImageUrl,
    'DatePicker': DatePicker,
    'Tabs': Tabs,
    'Alignment': Alignment,
    'TextAlign': TextAlign
};

function mapFields(fieldsJson) {
    return fieldsJson.map(field => {
        const FieldClass = FIELD_MAP[field.type];
        if (!FieldClass) return null;

        const { name, type, fields, ...options } = field;

        // SI c'est un REPEATER, on doit mapper ses propres champs internes
        if (type === 'Repeater' && fields) {
            options.fields = mapFields(fields); // Appel récursif ici
        }

        // SI c'est une ROW, on fait pareil
        if (type === 'Row' && fields) {
            return FieldClass(mapFields(fields)); // Row prend juste un tableau d'instances
        }

        return FieldClass(name, options);
    }).filter(f => f !== null);
}

async function registerComponent() {

    try {
        const response = await fetch('/admin/components/get', { method: 'POST' });

        if (response.ok) {
            const data = await response.json();
            data.forEach((config) => {
                editor.registerComponent(config.name, {
                    title: config.title,
                    category: config.category,
                    fields: mapFields(config.fields)
                });
            });
        }
    } catch (error) {
        console.error('Error fetching components:', error);
    }
}

registerComponent();


