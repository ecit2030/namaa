<template>
  <AdminLayout>
    <PageBreadcrumb :pageTitle="currentPageTitle" />
    <div class="space-y-5 sm:space-y-6">
      <ComponentCard :title="currentPageTitle">
        <CreateConsultationType />
      </ComponentCard>
    </div>
  </AdminLayout>
</template>

<script setup>
import PageBreadcrumb from '@/Components/common/PageBreadcrumb.vue'
import AdminLayout from '@/Components/layout/AdminLayout.vue'
import ComponentCard from '@/Components/common/ComponentCard.vue'
import CreateConsultationType from '@/Components/admin/consultation-type/CreateConsultationType.vue'
import { useI18n } from 'vue-i18n'
import { computed } from 'vue'

const { t } = useI18n()
const currentPageTitle = computed(() => t('consultationTypes.create'))
</script>
