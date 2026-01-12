// Simple objet pour stocker les configs de composants
export default {
    components: {
        newHero: {
            title: 'newHero',
            category: 'Banner',
            fields: [
                { type: 'Text', name: 'title', multiline: false },
                { type: 'HTMLText', name: 'content' },
                // etc...
            ],
        },
        other_component: {
            title: 'Autre',
            category: 'Banner',
            fields: [
                { type: 'Text', name: 'title', multiline: false },
                { type: 'HTMLText', name: 'content' },
            ],
        },
    },
};
