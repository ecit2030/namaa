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
  <section id="how-it-works" class="relative py-20 lg:py-28 bg-brand-950" dir="rtl">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-2">
          كيف يعمل
        </h2>
        <p class="text-xl font-medium text-white/90 mb-1">
          {{ section.title || 'ثلاث خطوات بسيطة' }}
        </p>
        <p class="text-white/80">
          {{ section.subtitle || 'للحصول على الاستشارة التي تحتاجها' }}
        </p>
      </div>

      <div class="relative">
        <div
          class="absolute top-5 right-0 left-0 h-0.5 rounded-full opacity-50 hidden lg:block bg-white/30"
          aria-hidden="true"
        />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-6">
          <div
            v-for="(step, index) in steps"
            :key="index"
            class="relative flex flex-col items-center text-center"
          >
            <div
              class="step-number relative z-10 shrink-0 w-11 h-11 rounded-full flex items-center justify-center font-bold text-sm shadow-lg mb-6"
            >
              {{ index + 1 }}
            </div>

            <div class="w-full rounded-2xl border border-white/15 bg-white/[0.06] p-6 hover:bg-white/[0.1] hover:border-white/25 transition-all">
              <h3 class="text-lg font-bold text-white mb-2">
                {{ step.title }}
              </h3>
              <p class="text-white/80 leading-relaxed text-sm">
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
  background-color: var(--color-white);
  color: var(--color-brand-500);
  border: 3px solid var(--color-brand-forest);
}
</style>
