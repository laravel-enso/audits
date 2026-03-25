<template>
    <enso-table class="box is-paddingless raises-on-hover"
        id="audits">
        <template #changes="{ row }">
            <diff :event="row.event" :changes="row.changes"/>
        </template>

        <template #createdBy="{ row }">
                <avatar class="is-24x24"
                    tooltip
                    :user="row.createdBy"
                    v-if="row.createdBy"/>
        </template>
    </enso-table>
</template>

<script>
import { EnsoTable } from '@enso-ui/tables/bulma';
import Avatar from '@enso-ui/users/src/bulma/pages/users/components/Avatar.vue';
import Diff from './components/Diff.vue';

export default {
    name: 'Index',

    components: { EnsoTable, Avatar, Diff },
};
</script>

<style lang="scss">
</style>
