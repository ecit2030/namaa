<template>
  <AdminLayout>
    <PageBreadcrumb :pageTitle="currentPageTitle" />
    <div class="space-y-5 sm:space-y-6">
      <ComponentCard :title="currentPageTitle">
        <EditConsultationType :consultation_type="consultation_type" />
      </ComponentCard>
    </div>
  </AdminLayout>
</template>

<script setup>
import PageBreadcrumb from '@/Components/common/PageBreadcrumb.vue'
import AdminLayout from '@/Components/layout/AdminLayout.vue'
import ComponentCard from '@/Components/common/ComponentCard.vue'
import EditConsultationType from '@/Components/admin/consultation-type/EditConsultationType.vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const currentPageTitle = computed(() => t('consultationTypes.edit'))
const consultation_type = computed(() => usePage().props.consultation_type)
</script>
