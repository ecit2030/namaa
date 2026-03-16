<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import LandingLayout from '@/Layouts/LandingLayout.vue';

const { t, locale } = useI18n();
</script>

<template>
  <LandingLayout>
    <Head :title="t('comingSoon.pageTitle')" />
    <section class="min-h-[60vh] flex items-center py-16 lg:py-24 bg-white">
      <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl mx-auto text-center">
          <h1 class="text-3xl sm:text-4xl font-bold text-brand-dark mb-4">
            {{ t('comingSoon.title') }}
          </h1>
          <p class="text-lg text-gray-600 mb-10">
            {{ t('comingSoon.subtitle') }}
          </p>
          <Link
            href="/"
            class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-white bg-brand-500 rounded-xl hover:bg-brand-600 transition-colors"
          >
            {{ t('comingSoon.backToHome') }}
            <svg class="w-5 h-5" :class="locale === 'ar' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </Link>
        </div>
      </div>
    </section>
  </LandingLayout>
</template>
