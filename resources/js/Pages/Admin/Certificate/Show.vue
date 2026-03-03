<template>
  <admin-layout>
    <PageBreadcrumb :pageTitle="currentPageTitle" />
    <ShowCertificateDetails :certificate="certificate" />
  </admin-layout>
</template>

<script setup>
import AdminLayout from '@/Components/layout/AdminLayout.vue'
import PageBreadcrumb from '@/Components/common/PageBreadcrumb.vue'
import ShowCertificateDetails from '@/Components/admin/certificate/ShowCertificate.vue'
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'
import { usePage } from '@inertiajs/vue3'

const { t } = useI18n()
const currentPageTitle = computed(() => t('certificate.showCertificate'))

const certificate = computed(() => usePage().props.certificate)
</script>
