<template>
    <Dropdown :triggers="['click','hover']" class="m-0 p-0">
        <template #popper>
            <div class="m-0 p-0 popper">
                <div v-if="event === auditEvent.Updated * 1">
                    <div class="has-background-light p-2">
                        <h6 class="title is-6 m-0">
                             {{ i18n("Updated") }}
                        </h6>
                    </div>
                    <div class="columns is-mobile m-0 is-gapless">
                        <div class="column is-half p-3 has-background-danger-light
                            has-text-danger-dark">
                            <div class="mb-2 has-text-weight-bold is-size-6">
                                 {{ i18n("Before") }}
                            </div>
                            <div
                                v-for="(value, key) in beforeChanges"
                                :key="key"
                                class="change-row is-size-7">
                                <span class="m-0">{{ key }} : &nbsp;</span>
                                <span class="has-text-weight-bold">{{ value }}</span>
                            </div>
                        </div>
                        <div class="column is-half p-3 has-background-success-light
                            has-text-success-dark">
                            <div class="mb-2 has-text-weight-bold is-size-6">
                                 {{ i18n("After") }}
                            </div>
                            <div
                                v-for="(value, key) in afterChanges"
                                :key="key"
                                class="change-row is-size-7">
                                <span class="m-0">{{ key }} : &nbsp;</span>
                                <span class="has-text-weight-bold">{{ value }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else-if="event === auditEvent.Created * 1"
                    class="has-background-success-light has-text-success-dark p-2">
                    <div class="mb-2 has-text-weight-bold is-size-6">
                        {{ i18n("Created") }}
                    </div>
                    <div
                        v-for="(value, key) in attributes"
                        :key="key"
                        class="change-row is-size-7">
                        <span class="m-0">{{ key }} : &nbsp;</span>
                        <span class="has-text-weight-bold">{{ value }}</span>
                    </div>
                </div>
                <div v-else-if="event === auditEvent.Deleted * 1"
                    class="has-background-danger-light has-text-danger-dark p-2">
                        <div class="mb-2 has-text-weight-bold is-size-6">
                            {{ i18n("Deleted") }}
                        </div>
                        <div
                            v-for="(value, key) in attributes"
                            :key="key"
                            class="change-row is-size-7">
                            <span class="m-0">{{ key }} : &nbsp;</span>
                            <span class="has-text-weight-bold">{{ value }}</span>
                        </div>
                </div>
            </div>
        </template>
        <span class="is-clickable has-text-info is-flex is-align-items-center">
            <span class="icon is-small mr-1">
                <Fa icon="eye"/>
            </span>
            <span class="is-size-7 has-text-weight-semibold">Vezi modificări</span>
        </span>
    </Dropdown>
</template>

<script setup>
import { computed, defineProps, inject } from 'vue';
import { useStore } from 'vuex';
import { Dropdown } from 'v-tooltip';
import { FontAwesomeIcon as Fa } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faEye } from '@fortawesome/free-solid-svg-icons';

library.add(faEye);

const props = defineProps({
    event: {
        type: [Number, String],
        required: true,
    },
    changes: {
        type: [Object, String, Array],
        required: true,
    },
});

console.log(props);

const i18n = inject('i18n');

const store = useStore();
const { auditEvent } = store.state.enums;

const parseData = data => {
    console.log(typeof data);
    if (typeof data === 'string') {
        try {
            return JSON.parse(data);
        } catch {
            return {};
        }
    }
    return data || {};
};
const beforeChanges = computed(() => parseData(props.changes?.before));
const afterChanges = computed(() => parseData(props.changes?.after));
const attributes = computed(() => parseData(props.changes));
</script>

<style>
.popper{
    min-width: 10em;
}
</style>
