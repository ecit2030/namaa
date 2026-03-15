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
        </div>
      </div>
    </section>
  </LandingLayout>
</template>
