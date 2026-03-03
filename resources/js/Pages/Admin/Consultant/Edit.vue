<template>
  <admin-layout>
    <PageBreadcrumb :pageTitle="currentPageTitle" />

    <EditConsultantForm
      :consultant="consultant"
      :consultation_types="consultation_types"
    />
  </admin-layout>
</template>

<script setup>
import AdminLayout from '@/Components/layout/AdminLayout.vue'
import PageBreadcrumb from '@/Components/common/PageBreadcrumb.vue'
import EditConsultantForm from '@/Components/admin/consultant/EditConsultant.vue'
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'
import { usePage } from '@inertiajs/vue3'


const { t } = useI18n()
const currentPageTitle = computed(() => t('consultants.editConsultant'))

// استلام البيانات من Inertia
const consultant = computed(() => usePage().props.consultant)
const consultation_types = computed(() => usePage().props.consultation_types)


</script>
