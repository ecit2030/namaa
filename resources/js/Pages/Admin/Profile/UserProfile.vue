<template>
  <admin-layout>
    <PageBreadcrumb :pageTitle="currentPageTitle" />

    <div
      class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6"
    >
      <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">{{ t('menu.profile') }}</h3>
      <profile-card :user="user"/>
      <personal-info-card :user="user"/>
      <address-card :user="user"/>
    </div>
  </admin-layout>
</template>

<script setup>
import AdminLayout from '@/Components/layout/AdminLayout.vue'
import PageBreadcrumb from '@/Components/common/PageBreadcrumb.vue'
import ProfileCard from '@/Components/profile/ProfileCard.vue'
import PersonalInfoCard from '@/Components/profile/PersonalInfoCard.vue'
import AddressCard from '@/Components/profile/AddressCard.vue'
import { useI18n } from 'vue-i18n'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const { t } = useI18n()
const currentPageTitle = computed(() => t('menu.profile'))


const user = computed(() => usePage().props.user)
</script>
