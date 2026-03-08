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
  <!-- Reyiada "مراحل طلب دراسة" style: clear section title + numbered steps -->
  <section id="how-it-works" class="relative py-20 lg:py-28 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-14">
        <h2 class="text-3xl sm:text-4xl font-bold text-stone-900 mb-3">
          {{ section.title || 'كيف يعمل' }}
        </h2>
        <p class="text-lg text-stone-600">
          {{ section.subtitle || 'مراحل طلب الاستشارة' }}
        </p>
      </div>

      <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-center">
        <div class="order-2 lg:order-1 space-y-6">
          <div
            v-for="(step, index) in steps"
            :key="index"
            class="flex gap-5 items-start bg-stone-50 rounded-xl border border-stone-100 p-6 hover:border-teal-100 hover:bg-teal-50/30 transition-colors"
          >
            <div class="shrink-0 w-12 h-12 rounded-lg bg-teal-600 text-white flex items-center justify-center font-bold text-lg">
              {{ index + 1 }}
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-lg font-bold text-stone-900 mb-1">
                {{ step.title }}
              </h3>
              <p class="text-stone-600 leading-relaxed text-sm">
                {{ step.description }}
              </p>
            </div>
          </div>
        </div>

        <div class="order-1 lg:order-2 flex justify-center">
          <div class="relative">
            <div class="absolute -inset-4 bg-teal-100/40 rounded-2xl blur-2xl" />
            <img
              v-if="section.image"
              :src="`/storage/${section.image}`"
              alt="كيف يعمل"
              class="relative z-10 w-full max-w-sm object-contain"
            />
            <img
              v-else
              src="/images/landing/how-it-works-mockup.png"
              alt="كيف يعمل"
              class="relative z-10 w-full max-w-sm object-contain"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
