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
  <section id="how-it-works" class="relative py-20 lg:py-28 bg-brand-950" dir="rtl" style="background-color: #0E0E0E;">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-2">
          كيف يعمل
        </h2>
        <p class="text-xl font-medium text-white/90 mb-1">
          {{ section.title || 'ثلاث خطوات بسيطة' }}
        </p>
        <p class="text-white/75">
          {{ section.subtitle || 'للحصول على الاستشارة التي تحتاجها' }}
        </p>
      </div>

      <div class="relative">
        <div
          class="absolute top-5 right-0 left-0 h-0.5 rounded-full opacity-40 hidden lg:block bg-white/40"
        />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-6">
          <div
            v-for="(step, index) in steps"
            :key="index"
            class="relative flex flex-col items-center text-center"
          >
            <div
              class="relative z-10 shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm border-4 border-brand-500 shadow mb-6 bg-white"
              style="color: #12392A; border-color: #12392A;"
            >
              {{ index + 1 }}
            </div>

            <div class="w-full rounded-xl border border-white/20 bg-white/5 p-6 hover:bg-white/10 hover:border-white/30 transition-all">
              <h3 class="text-lg font-bold text-white mb-2">
                {{ step.title }}
              </h3>
              <p class="text-white/75 leading-relaxed text-sm">
                {{ step.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
