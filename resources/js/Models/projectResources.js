export const projects = {
    'name': 'Proyecto',
    'routes': {
        index: () => route('projects.index'),
        create: () => route('projects.create'),
        store: () => route('projects.store'),
        edit: (id) => route('projects.edit', id),
        update: (id) => route('projects.index', id),
        delete: (id) => route('projects.delete', id)
    }

}