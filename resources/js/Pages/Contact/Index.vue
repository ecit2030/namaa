<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import LandingLayout from '@/Layouts/LandingLayout.vue';

const { t, locale } = useI18n();
</script>

<template>
  <LandingLayout>
    <Head :title="t('contact.pageTitle')" />
    <section class="min-h-[60vh] flex items-center py-16 lg:py-24 bg-white">
      <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
          <div class="w-full flex mb-8" :class="locale === 'ar' ? 'justify-end' : 'justify-start'">
            <Link
              href="/"
              class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-brand-500 transition-colors"
            >
            <svg class="w-5 h-5 shrink-0" :class="locale === 'ar' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
            {{ t('contact.backToHome') }}
            </Link>
          </div>
          <h1 class="text-3xl sm:text-4xl font-bold text-brand-dark mb-4">
            {{ t('contact.title') }}
          </h1>
          <p class="text-lg text-gray-600 mb-10">
            {{ t('contact.subtitle') }}
          </p>
          <div class="bg-brand-50 rounded-2xl p-8 text-center">
            <div class="space-y-4 text-brand-dark">
              <p class="text-brand-dark/90">
                {{ t('landing.footer.platformDescription') }}
              </p>
              <a href="mailto:info@consultant-platform.com" class="block text-brand-500 hover:text-brand-600 font-medium">
                info@consultant-platform.com
              </a>
              <a href="tel:+966501234567" class="block font-medium text-brand-500 hover:text-brand-600" dir="ltr">
                +966 50 123 4567
              </a>
              <p class="text-gray-600">
                {{ t('landing.footer.address') }}
              </p>
            </div>
          </div>
          <Link
            href="/"
            class="inline-flex items-center gap-2 mt-8 px-6 py-3 font-semibold text-brand-500 border-2 border-brand-500 rounded-xl hover:bg-brand-50 transition-colors"
          >
            {{ t('contact.backToHome') }}
            <svg class="w-5 h-5" :class="locale === 'ar' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </Link>
        </div>
      </div>
    </section>
  </LandingLayout>
</template>
