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
  <section id="how-it-works" class="relative py-20 lg:py-28 bg-stone-50" dir="rtl">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-stone-900 mb-2">
          كيف يعمل
        </h2>
        <p class="text-xl font-medium text-stone-700 mb-1">
          {{ section.title || 'ثلاث خطوات بسيطة' }}
        </p>
        <p class="text-stone-600">
          {{ section.subtitle || 'للحصول على الاستشارة التي تحتاجها' }}
        </p>
      </div>

      <!-- Timeline: line + nodes + content -->
      <div class="relative pr-12 lg:pr-14">
        <!-- Vertical line -->
        <div
          class="absolute top-6 bottom-6 w-0.5 rounded-full opacity-40"
          style="right: 1.25rem; background-color: #028187;"
        />

        <div class="space-y-8">
          <div
            v-for="(step, index) in steps"
            :key="index"
            class="relative flex gap-6 items-start"
          >
            <!-- Node on the line -->
            <div
              class="absolute shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-white text-sm border-4 border-stone-50 shadow timeline-node"
              style="background-color: #028187;"
            >
              {{ index + 1 }}
            </div>

            <!-- Content -->
            <div class="flex-1 min-w-0 mr-14 rounded-xl border border-stone-200 bg-white p-6 shadow-sm hover:shadow-md hover:border-[#028187]/20 transition-all">
              <h3 class="text-lg font-bold text-stone-900 mb-2">
                {{ step.title }}
              </h3>
              <p class="text-stone-600 leading-relaxed text-sm">
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
.timeline-node {
  right: 1.25rem;
  top: 0.25rem;
  transform: translateX(50%);
}
</style>
