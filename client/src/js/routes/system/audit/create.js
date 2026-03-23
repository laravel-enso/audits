const AuditCreate = () => import('../../../pages/system/audit/Create.vue');

export default {
    name: 'system.audit.create',
    path: 'create',
    component: AuditCreate,
    meta: {
        breadcrumb: 'create',
        title: 'Create Audit',
    },
};
