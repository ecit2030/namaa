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
  { question: 'كيف يمكنني حجز استشارة؟', answer: 'تصفح المستشارين، اختر المناسب، حدد نوع الاستشارة (فيديو/صوت/نص) والوقت، ثم أتمم الدفع الآمن لاستلام التأكيد وتفاصيل الاتصال.', isOpen: true },
  { question: 'ما أنواع الخدمات المتاحة؟', answer: 'نوفر استشارات مالية ومحاسبية، دراسة الجدوى، تحليل السوق، التخطيط المالي، إعداد القوائم المالية، الاستشارات الضريبية، وتقييم المشاريع.', isOpen: false },
  { question: 'كيف يتم فحص المستشارين؟', answer: 'جميع المستشارين يخضعون لتحقق من المؤهلات الأكاديمية والشهادات المهنية والخبرة العملية قبل الانضمام للمنصة.', isOpen: false },
  { question: 'كيف يتلقى المستشارون أرباحهم؟', answer: 'يتلقى المستشارون أرباحهم دورياً (أسبوعياً أو شهرياً) عبر تحويل بنكي أو المحفظة الإلكترونية في التطبيق.', isOpen: false },
  { question: 'هل الاستشارات سرية وآمنة؟', answer: 'نعم، جميع الاستشارات والبيانات محمية بتشفير حديث ونلتزم بسياسات خصوصية صارمة.', isOpen: false },
  { question: 'ماذا لو واجهت مشكلة تقنية أثناء الجلسة؟', answer: 'تواصل مع فريق الدعم على مدار الساعة عبر الشات في التطبيق أو البريد. نحل أي مشكلة فوراً ونعيد الجدولة عند الحاجة.', isOpen: false },
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
  <section id="faq" class="relative py-20 lg:py-28 bg-stone-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-14 items-start">
        <div>
          <h2 class="text-3xl sm:text-4xl font-bold text-stone-900 mb-3">
            الأسئلة الشائعة
          </h2>
          <p class="text-lg text-stone-600 mb-8">
            {{ section?.title || 'إجابات سريعة عن استفساراتك' }}
          </p>
          <div class="text-7xl sm:text-8xl text-stone-200 font-bold select-none">
            ؟
          </div>
        </div>

        <div class="space-y-2">
          <button
            v-for="(faq, index) in faqs"
            :key="index"
            type="button"
            class="w-full text-right rounded-xl border bg-white transition-all overflow-hidden"
            :class="faq.isOpen ? 'border-teal-200 shadow-sm ring-1 ring-teal-100' : 'border-stone-200 hover:border-stone-300'"
            @click="toggle(index)"
          >
            <div class="flex items-center justify-between gap-4 px-5 py-4">
              <span class="text-base font-bold text-stone-900 flex-1">
                {{ faq.question }}
              </span>
              <svg
                class="w-5 h-5 text-stone-400 shrink-0 transition-transform duration-200"
                :class="faq.isOpen ? 'rotate-180' : ''"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
            <Transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="opacity-0"
              enter-to-class="opacity-100"
              leave-active-class="transition duration-150 ease-in"
              leave-from-class="opacity-100"
              leave-to-class="opacity-0"
            >
              <div v-show="faq.isOpen" class="px-5 pb-5 text-stone-600 leading-relaxed text-sm border-t border-stone-100 pt-3">
                {{ faq.answer }}
              </div>
            </Transition>
          </button>
        </div>
      </div>
    </div>
  </section>
</template>
