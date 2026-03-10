<script setup lang="ts">
import { ref } from 'vue';

interface Props {
  section?: {
    title?: string;
    subtitle?: string;
    items?: Array<{ title: string; description: string }>;
  };
}

const props = defineProps<Props>();

const defaultFaqs = [
  { question: 'كيف يمكنني حجز استشارة؟', answer: 'يمكنك تصفح المستشارين المتاحين، اختيار المستشار المناسب، ثم تحديد نوع الاستشارة (فيديو/صوت/نص) والوقت المناسب لك. بعد إتمام الدفع الآمن، ستتلقى تأكيداً بالحجز وتفاصيل الاتصال.', isOpen: true },
  { question: 'ما أنواع الخدمات المتاحة؟', answer: 'نوفر استشارات مالية ومحاسبية، دراسة الجدوى، تحليل السوق، التخطيط المالي، إعداد القوائم المالية، الاستشارات الضريبية، وتقييم المشاريع.', isOpen: false },
  { question: 'كيف يتم فحص المستشارين؟', answer: 'جميع المستشارين يخضعون لتحقق من المؤهلات الأكاديمية والشهادات المهنية والخبرة العملية قبل الانضمام للمنصة.', isOpen: false },
  { question: 'كيف يتلقى المستشارون أرباحهم؟', answer: 'يتلقى المستشارون أرباحهم دورياً (أسبوعياً أو شهرياً) عبر تحويل بنكي أو المحفظة الإلكترونية في التطبيق.', isOpen: false },
  { question: 'هل الاستشارات سرية وآمنة؟', answer: 'نعم، جميع الاستشارات والبيانات محمية بتشفير حديث ونلتزم بسياسات خصوصية صارمة.', isOpen: false },
  { question: 'ماذا أفعل إذا واجهت مشكلة تقنية أثناء الاستشارة؟', answer: 'تواصل مع فريق الدعم على مدار الساعة عبر الشات في التطبيق أو البريد. نحل أي مشكلة فوراً ونعيد الجدولة عند الحاجة.', isOpen: false },
];

const faqs = ref(
  props.section?.items?.map((item, index) => ({
    question: item.title,
    answer: item.description,
    isOpen: index === 0,
  })) || defaultFaqs
);

const toggle = (index: number) => {
  faqs.value[index].isOpen = !faqs.value[index].isOpen;
};
</script>

<template>
  <!-- Dark FAQ section -->
  <section id="faq" class="relative py-20 lg:py-28 bg-brand-500 overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-14">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-2">
          الأسئلة الشائعة
        </h2>
        <p class="text-white/85">
          {{ section?.title || 'استفسارات متكررة' }}
        </p>
      </div>

      <div class="space-y-4">
        <div
          v-for="(faq, index) in faqs"
          :key="index"
          class="group rounded-2xl overflow-hidden transition-all duration-300"
          :class="faq.isOpen ? 'bg-white/[0.08] border border-white/20 ring-2 ring-brand-forest/30' : 'bg-white/[0.05] border border-white/15 hover:bg-white/[0.08]'"
        >
          <button
            type="button"
            class="w-full text-right flex items-start gap-4 px-6 py-5 transition-colors focus-visible:outline focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-white/30"
            @click="toggle(index)"
          >
            <span
              class="faq-bar shrink-0 w-1 rounded-full min-h-[24px] transition-colors duration-300"
              :class="faq.isOpen ? 'faq-bar-open' : 'bg-white/40 group-hover:bg-white/60'"
            />
            <span class="text-lg font-bold text-white flex-1 pt-0.5">
              {{ faq.question }}
            </span>
            <svg
              class="w-5 h-5 text-white/70 shrink-0 transition-transform duration-300 mt-0.5"
              :class="faq.isOpen ? 'rotate-180' : ''"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 max-h-0"
            enter-to-class="opacity-100 max-h-[500px]"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 max-h-[500px]"
            leave-to-class="opacity-0 max-h-0"
          >
            <div v-show="faq.isOpen" class="overflow-hidden">
              <div class="px-6 pb-5 pr-14 text-white/85 leading-relaxed text-sm border-t border-white/15 pt-4">
                {{ faq.answer }}
              </div>
            </div>
          </Transition>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.faq-bar-open {
  background-color: var(--color-brand-forest);
}
</style>
