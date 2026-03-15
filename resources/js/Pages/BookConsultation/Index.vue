<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import LandingLayout from '@/Layouts/LandingLayout.vue';
import { route } from '@/route';

const { t, locale } = useI18n();
const page = usePage();

const form = useForm({
  name: '',
  email: '',
  phone: '',
  message: '',
});

const success = () => Boolean((page.props as { flash?: { success?: boolean } }).flash?.success);

function submit() {
  form.post(route('book-consultation.store'), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  });
}
</script>

<template>
  <LandingLayout>
    <Head :title="t('bookConsultation.pageTitle')" />
    <section class="min-h-[60vh] py-16 lg:py-24 bg-white">
      <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
          <h1 class="text-3xl sm:text-4xl font-bold text-brand-dark mb-4">
            {{ t('bookConsultation.title') }}
          </h1>
          <p class="text-lg text-gray-600 mb-10">
            {{ t('bookConsultation.subtitle') }}
          </p>

          <div v-if="success()" class="mb-8 p-4 rounded-xl bg-green-50 text-green-800 border border-green-200">
            {{ t('bookConsultation.successMessage') }}
          </div>

          <form @submit.prevent="submit" class="bg-brand-50 rounded-2xl p-8 text-center mb-12">
            <div class="space-y-5 text-left" :class="locale === 'ar' ? 'text-right' : 'text-left'">
              <div>
                <label for="name" class="block text-sm font-medium text-brand-dark mb-1.5">
                  {{ t('bookConsultation.name') }} <span class="text-red-500">*</span>
                </label>
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  required
                  class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-brand-dark focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"
                  :placeholder="t('bookConsultation.namePlaceholder')"
                />
                <p v-if="form.errors.name" class="mt-1 text-sm text-red-500">{{ form.errors.name }}</p>
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-brand-dark mb-1.5">
                  {{ t('bookConsultation.email') }} <span class="text-red-500">*</span>
                </label>
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  required
                  class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-brand-dark focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"
                  :placeholder="t('bookConsultation.emailPlaceholder')"
                />
                <p v-if="form.errors.email" class="mt-1 text-sm text-red-500">{{ form.errors.email }}</p>
              </div>
              <div>
                <label for="phone" class="block text-sm font-medium text-brand-dark mb-1.5">
                  {{ t('bookConsultation.phone') }}
                </label>
                <input
                  id="phone"
                  v-model="form.phone"
                  type="tel"
                  class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-brand-dark focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20"
                  :placeholder="t('bookConsultation.phonePlaceholder')"
                  :dir="locale === 'ar' ? 'rtl' : 'ltr'"
                />
                <p v-if="form.errors.phone" class="mt-1 text-sm text-red-500">{{ form.errors.phone }}</p>
              </div>
              <div>
                <label for="message" class="block text-sm font-medium text-brand-dark mb-1.5">
                  {{ t('bookConsultation.message') }}
                </label>
                <textarea
                  id="message"
                  v-model="form.message"
                  rows="4"
                  class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-brand-dark focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 resize-none"
                  :placeholder="t('bookConsultation.messagePlaceholder')"
                />
                <p v-if="form.errors.message" class="mt-1 text-sm text-red-500">{{ form.errors.message }}</p>
              </div>
              <div class="pt-2">
                <button
                  type="submit"
                  :disabled="form.processing"
                  class="w-full py-3 px-6 font-semibold text-white bg-brand-500 rounded-xl hover:bg-brand-600 focus:ring-2 focus:ring-brand-500/20 disabled:opacity-70 transition-colors"
                >
                  {{ form.processing ? t('bookConsultation.sending') : t('bookConsultation.submit') }}
                </button>
              </div>
            </div>
          </form>

          <h2 class="text-xl font-bold text-brand-dark mb-4">
            {{ t('bookConsultation.contactTitle') }}
          </h2>
          <div class="bg-brand-50 rounded-2xl p-8 text-center mb-8">
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
            class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-brand-500 border-2 border-brand-500 rounded-xl hover:bg-brand-50 transition-colors"
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
