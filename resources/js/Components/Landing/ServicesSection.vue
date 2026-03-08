<script setup lang="ts">
import { computed } from 'vue';

interface ServiceItem {
  title: string;
  description: string;
  icon?: string;
  image?: string;
  background_color?: string;
  link?: string;
  link_text?: string;
}

interface Props {
  section: {
    title?: string;
    subtitle?: string;
    items?: ServiceItem[];
  };
}

const props = defineProps<Props>();

const defaultServices: ServiceItem[] = [
  { title: 'تحليل مالي', description: 'تقدير التكاليف والإيرادات والأرباح المتوقعة، نقطة التعادل والعائد على الاستثمار.', icon: '📊', link: '#', link_text: 'المزيد' },
  { title: 'تحليل سوق', description: 'دراسة حجم السوق، العملاء، المنافسين وفرص النمو والتهديدات.', icon: '🔍', link: '#', link_text: 'المزيد' },
  { title: 'دراسة جدوى', description: 'تحليل الجدوى الاقتصادية والفنية للمشروع واتخاذ القرار المناسب.', icon: '💡', link: '#', link_text: 'المزيد' },
  { title: 'تقييم أعمال', description: 'فحص أداء الشركة وتحديد قيمتها السوقية وجاذبيتها للاستثمار.', icon: '✅', link: '#', link_text: 'المزيد' },
  { title: 'إدارة استثمار', description: 'مراقبة قرارات الاستثمار وتوزيع رأس المال وتقليل المخاطر.', icon: '💼', link: '#', link_text: 'المزيد' },
  { title: 'خطة عمل', description: 'وثيقة توضح أهداف المشروع والخطوات المالية والتسويقية.', icon: '📋', link: '#', link_text: 'المزيد' },
];

const services = computed(() => props.section.items || defaultServices);
</script>

<template>
  <!-- Reyiada "خدماتنا" style: "حلولنا التي تدفع مشاريعك نحو النجاح" + cards with المزيد -->
  <section id="services" class="relative py-20 lg:py-28 bg-brand-offwhite">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-14">
        <h2 class="text-3xl sm:text-4xl font-bold text-brand-black mb-3">
          خدماتنا
        </h2>
        <h3 class="text-xl text-brand-forest font-medium mb-2">
          {{ section.title || 'حلولنا التي تدفع مشاريعك نحو النجاح' }}
        </h3>
        <p class="text-brand-forest/90">
          {{ section.subtitle || 'خدمات مالية ومحاسبية مصممة لدعم نمو أعمالك' }}
        </p>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <a
          v-for="(service, index) in services"
          :key="index"
          :href="service.link || '#'"
          class="group block bg-white rounded-xl border border-brand-pale/50 p-6 lg:p-8 shadow-sm hover:shadow-lg hover:border-brand-forest/40 transition-all duration-300 min-h-[260px] flex flex-col"
        >
          <h3 class="text-lg font-bold text-brand-black mb-3">
            {{ service.title }}
          </h3>
          <p class="text-brand-forest/90 leading-relaxed text-sm flex-1 line-clamp-3 mb-4">
            {{ service.description }}
          </p>
          <span class="inline-flex items-center gap-1 text-sm font-semibold text-brand-forest group-hover:gap-2 transition-all">
            {{ service.link_text || 'المزيد' }}
            <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </span>
        </a>
      </div>
    </div>
  </section>
</template>
