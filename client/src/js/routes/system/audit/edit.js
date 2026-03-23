const AuditEdit = () => import('../../../pages/system/audit/Edit.vue');

export default {
    name: 'system.audit.edit',
    path: ':audit/edit',
    component: AuditEdit,
    meta: {
        breadcrumb: 'edit',
        title: 'Edit Audit',
    },
};
