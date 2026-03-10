<script setup lang="ts">
interface Props {
  section: {
    title?: string;
    subtitle?: string;
    image?: string;
    items?: Array<{
      title: string;
      description: string;
      icon: string;
    }>;
  };
}

const props = defineProps<Props>();

const defaultSteps = [
  { title: 'تصميم المستشارين والخدمات', description: 'ابحث عن المستشارين حسب التخصص والتقييمات واختر الخدمة المناسبة', icon: 'check' },
  { title: 'اختر الوقت والطريقة وادفع بأمان', description: 'حدد موعد الجلسة ونوع الاستشارة (فيديو/صوت/نص)، وأتمم الدفع الآمن', icon: 'check' },
  { title: 'التق بالمستشار واستلم التقرير', description: 'احضر الجلسة الاستشارية، استلم التقارير والمخرجات، ثم قيّم الخدمة', icon: 'check' },
];

const steps = props.section.items || defaultSteps;
</script>

<template>
  <section id="how-it-works" class="relative py-20 lg:py-28 bg-white" dir="rtl">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-brand-dark mb-2">
          كيف يعمل
        </h2>
        <p class="text-xl font-medium text-gray-600 mb-1">
          {{ section.title || 'ثلاث خطوات بسيطة' }}
        </p>
        <p class="text-brand-muted">
          {{ section.subtitle || 'للحصول على الاستشارة التي تحتاجها' }}
        </p>
      </div>

      <div class="relative">
        <div
          class="absolute top-5 right-0 left-0 h-0.5 rounded-full hidden lg:block bg-brand-200"
          aria-hidden="true"
        />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-6">
          <div
            v-for="(step, index) in steps"
            :key="index"
            class="relative flex flex-col items-center text-center"
          >
            <div
              class="step-number relative z-10 shrink-0 w-11 h-11 rounded-full flex items-center justify-center font-bold text-sm shadow-md mb-6"
            >
              {{ index + 1 }}
            </div>

            <div class="w-full rounded-2xl border border-gray-200 bg-white p-6 hover:border-brand-300 hover:shadow-md transition-all">
              <h3 class="text-lg font-bold text-brand-dark mb-2">
                {{ step.title }}
              </h3>
              <p class="text-gray-600 leading-relaxed text-sm">
                {{ step.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.step-number {
  background-color: var(--color-brand-500);
  color: var(--color-white);
  border: 3px solid var(--color-brand-forest);
}
</style>
