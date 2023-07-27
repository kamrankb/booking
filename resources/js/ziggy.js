const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"front.home":{"uri":"\/","methods":["GET","HEAD"]},"front.about.us":{"uri":"about-us","methods":["GET","HEAD"]},"front.logo.and.branding":{"uri":"logo-and-branding","methods":["GET","HEAD"]},"front.website.design":{"uri":"website-design","methods":["GET","HEAD"]},"front.pricing":{"uri":"pricing","methods":["GET","HEAD"]},"front.portfolio":{"uri":"portfolio","methods":["GET","HEAD"]},"front.contact.us":{"uri":"contact-us","methods":["GET","HEAD"]},"front.contact.us.process":{"uri":"contact-us","methods":["POST"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"]},"password.email":{"uri":"password\/email","methods":["POST"]},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"]},"password.update":{"uri":"password\/reset","methods":["POST"]},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"]},"home":{"uri":"admin\/admin","methods":["GET","HEAD"]},"admin.dashboard":{"uri":"admin\/dashboard","methods":["GET","HEAD"]},"mark-all-read":{"uri":"admin\/notification\/mark-all-read","methods":["GET","HEAD"]},"dashboard.getpayments":{"uri":"admin\/dashboard\/getPayments","methods":["GET","HEAD"]},"getpaymentlinkapi":{"uri":"admin\/paymentlinks","methods":["GET","HEAD"]},"getpaymentlinkapiyearly":{"uri":"admin\/paymentlinks\/yearly","methods":["GET","HEAD"]},"Payments_category_api":{"uri":"admin\/payments\/category\/api","methods":["GET","HEAD"]},"dateRange_Monthly_payments":{"uri":"admin\/Total\/payments\/api","methods":["POST"]},"dateRange_Orders":{"uri":"admin\/Total\/orders","methods":["POST"]},"dateRange_Average_price":{"uri":"admin\/average\/price","methods":["POST"]},"dateRange_Latest_transactioN":{"uri":"admin\/payments\/latest\/transaction","methods":["GET","HEAD","POST","PUT","PATCH","DELETE","OPTIONS"]},"dateRange_Revenue":{"uri":"admin\/revenue","methods":["POST"]},"dateRange_DonutCharts_Apidata":{"uri":"admin\/DateRange\/DonutCharts","methods":["POST"]},"dateRange_LineCharts_Apidata":{"uri":"admin\/DateRange\/LineCharts","methods":["POST"]},"user.list":{"uri":"admin\/user\/list","methods":["GET","HEAD"]},"user.add":{"uri":"admin\/user\/add","methods":["GET","HEAD"]},"user.edit":{"uri":"admin\/user\/edit\/{id}","methods":["GET","HEAD"]},"user.detail.view":{"uri":"admin\/user\/detail\/{id?}","methods":["GET","HEAD"]},"user.remove":{"uri":"admin\/user\/remove","methods":["POST"]},"user.destroy":{"uri":"admin\/user\/destroy","methods":["POST"]},"user.restore":{"uri":"admin\/user\/restore","methods":["POST"]},"user.update":{"uri":"admin\/user\/update","methods":["POST"]},"user.status":{"uri":"admin\/user\/status\/{id}","methods":["POST"]},"user.store":{"uri":"admin\/user\/store","methods":["POST"]},"user.list.trashed":{"uri":"admin\/user\/trash","methods":["GET","HEAD"]},"admin-user.fetchdata":{"uri":"admin\/additional-permission\/{id}","methods":["GET","HEAD"]},"admin-user.additionalpermission":{"uri":"admin\/user\/additionalpermission\/{id}","methods":["POST"]},"contact-queries.list":{"uri":"admin\/contact-queries\/list","methods":["GET","HEAD"]},"contact-queries.list.trashed":{"uri":"admin\/contact-queries\/trash","methods":["GET","HEAD"]},"contact-queries.add":{"uri":"admin\/contact-queries\/add","methods":["GET","HEAD"]},"contact-queries.save":{"uri":"admin\/contact-queries\/save","methods":["POST"]},"contact-queries.edit":{"uri":"admin\/contact-queries\/edit\/{id}","methods":["GET","HEAD"]},"contact-queries.restore":{"uri":"admin\/contact-queries\/restore\/{id}","methods":["GET","HEAD"]},"contact-queries.detail.view":{"uri":"admin\/contact-queries\/detail\/{isTrashed?}","methods":["POST"]},"contact-queries.remove":{"uri":"admin\/contact-queries\/remove","methods":["POST"]},"contact-queries.view":{"uri":"admin\/contact-queries\/view","methods":["POST"]},"contact-queries.update":{"uri":"admin\/contact-queries\/update","methods":["POST"]},"contact-queries.delete":{"uri":"admin\/contact-queries\/delete","methods":["POST"]},"contact-queries.status":{"uri":"admin\/contact-queries\/status\/{id}","methods":["POST"]},"categories.list":{"uri":"admin\/category\/list","methods":["GET","HEAD"]},"categories.list.trashed":{"uri":"admin\/category\/trash","methods":["GET","HEAD"]},"categories.detail.view":{"uri":"admin\/category\/detail\/{isTrashed?}","methods":["POST"]},"categories.restore":{"uri":"admin\/category\/restore\/{id}","methods":["GET","HEAD"]},"categories.add":{"uri":"admin\/category\/add","methods":["GET","HEAD"]},"categories.save":{"uri":"admin\/category\/save","methods":["POST"]},"categories.edit":{"uri":"admin\/category\/edit\/{id}","methods":["GET","HEAD"]},"categories.remove":{"uri":"admin\/category\/remove","methods":["POST"]},"categories.view":{"uri":"admin\/category\/view","methods":["GET","HEAD"]},"categories.update":{"uri":"admin\/category\/update","methods":["POST"]},"categories.delete":{"uri":"admin\/category\/delete","methods":["POST"]},"categories.status":{"uri":"admin\/category\/status\/{id}","methods":["POST"]},"sub-category.list":{"uri":"admin\/sub-category\/list","methods":["GET","HEAD"]},"sub-category.list.trashed":{"uri":"admin\/sub-category\/trash","methods":["GET","HEAD"]},"sub-category.add":{"uri":"admin\/sub-category\/add","methods":["GET","HEAD"]},"sub-category.edit":{"uri":"admin\/sub-category\/edit\/{id}","methods":["GET","HEAD"]},"sub-category.detail.view":{"uri":"admin\/sub-category\/detail\/{isTrashed?}","methods":["POST"]},"sub-category.store":{"uri":"admin\/sub-category\/store","methods":["POST"]},"sub-category.update":{"uri":"admin\/sub-category\/edit","methods":["POST"]},"sub-category.status":{"uri":"admin\/sub-category\/status\/{id}","methods":["POST"]},"sub-category.remove":{"uri":"admin\/sub-category\/remove","methods":["POST"]},"sub-category.restore":{"uri":"admin\/sub-category\/restore\/{id}","methods":["GET","HEAD"]},"sub-category.delete":{"uri":"admin\/sub-category\/delete","methods":["POST"]},"product.list":{"uri":"admin\/product\/list","methods":["GET","HEAD"]},"product.list.trashed":{"uri":"admin\/product\/trash","methods":["GET","HEAD"]},"product.add":{"uri":"admin\/product\/add","methods":["GET","HEAD"]},"product.edit":{"uri":"admin\/product\/edit\/{id}","methods":["GET","HEAD"]},"product.detail.view":{"uri":"admin\/product\/detail\/{isTrashed?}","methods":["POST"]},"product.remove":{"uri":"admin\/product\/remove","methods":["POST"]},"product.restore":{"uri":"admin\/product\/restore\/{id}","methods":["GET","HEAD"]},"product.status":{"uri":"admin\/product\/status\/{id}","methods":["POST"]},"product.store":{"uri":"admin\/product\/store","methods":["POST"]},"product.update":{"uri":"admin\/product\/edit","methods":["POST"]},"product.delete":{"uri":"admin\/product\/delete","methods":["POST"]},"product-bundle.list":{"uri":"admin\/product-bundle\/list","methods":["GET","HEAD"]},"product-bundle.list.trashed":{"uri":"admin\/product-bundle\/trash","methods":["GET","HEAD"]},"product-bundle.add":{"uri":"admin\/product-bundle\/add","methods":["GET","HEAD"]},"product-bundle.edit":{"uri":"admin\/product-bundle\/edit\/{id}","methods":["GET","HEAD"]},"product-bundle.detail.view":{"uri":"admin\/product-bundle\/detail\/{isTrashed?}","methods":["POST"]},"product-display.view":{"uri":"admin\/products-display\/{isType?}","methods":["POST"]},"product-bundle.remove":{"uri":"admin\/product-bundle\/remove","methods":["POST"]},"product-bundle.restore":{"uri":"admin\/product-bundle\/restore\/{id}","methods":["GET","HEAD"]},"product-bundle.status":{"uri":"admin\/product-bundle\/status\/{id}","methods":["POST"]},"product-bundle.store":{"uri":"admin\/product-bundle\/store","methods":["POST"]},"product-bundle.update":{"uri":"admin\/product-bundle\/edit","methods":["POST"]},"product-bundle.delete":{"uri":"admin\/product-bundle\/delete","methods":["POST"]},"page.list":{"uri":"admin\/page\/list","methods":["GET","HEAD"]},"page.list.trashed":{"uri":"admin\/page\/trash","methods":["GET","HEAD"]},"page.add":{"uri":"admin\/page\/add","methods":["GET","HEAD"]},"page.edit":{"uri":"admin\/page\/edit\/{id}","methods":["GET","HEAD"]},"page.detail.view":{"uri":"admin\/page\/detail\/{isTrashed?}","methods":["POST"]},"page.store":{"uri":"admin\/page\/store","methods":["POST"]},"page.update":{"uri":"admin\/page\/edit","methods":["POST"]},"page.status":{"uri":"admin\/page\/status\/{id}","methods":["POST"]},"page.restore":{"uri":"admin\/page\/restore\/{id}","methods":["GET","HEAD"]},"page.remove":{"uri":"admin\/page\/remove","methods":["POST"]},"page.delete":{"uri":"admin\/page\/delete","methods":["POST"]},"page.slug":{"uri":"admin\/{page}","methods":["GET","HEAD"]},"testimonial.list":{"uri":"admin\/testimonial\/list","methods":["GET","HEAD"]},"testimonial.add":{"uri":"admin\/testimonial\/add","methods":["GET","HEAD"]},"testimonial.edit":{"uri":"admin\/testimonial\/edit\/{id}","methods":["GET","HEAD"]},"testimonial.detail.view":{"uri":"admin\/testimonial\/detail\/{id?}","methods":["GET","HEAD"]},"testimonial.remove":{"uri":"admin\/testimonial\/remove","methods":["POST"]},"testimonial.destroy":{"uri":"admin\/testimonial\/destroy","methods":["POST"]},"testimonial.restore":{"uri":"admin\/testimonial\/restore","methods":["POST"]},"testimonial.update":{"uri":"admin\/testimonial\/update","methods":["POST"]},"testimonial.status":{"uri":"admin\/testimonial\/status\/{id}","methods":["POST"]},"testimonial.store":{"uri":"admin\/testimonial\/store","methods":["POST"]},"testimonial.list.trashed":{"uri":"admin\/testimonial\/trash","methods":["GET","HEAD"]},"faq.list":{"uri":"admin\/faq\/list","methods":["GET","HEAD"]},"faq.list.trashed":{"uri":"admin\/faq\/trash","methods":["GET","HEAD"]},"faq.add":{"uri":"admin\/faq\/add","methods":["GET","HEAD"]},"faq.edit":{"uri":"admin\/faq\/edit\/{id}","methods":["GET","HEAD"]},"faq.detail.view":{"uri":"admin\/faq\/detail\/{isTrashed?}","methods":["POST"]},"faq.remove":{"uri":"admin\/faq\/remove","methods":["POST"]},"faq.restore":{"uri":"admin\/faq\/restore\/\/{id}","methods":["GET","HEAD"]},"faq.status":{"uri":"admin\/faq\/status\/{id}","methods":["POST"]},"faq.store":{"uri":"admin\/faq\/store","methods":["POST"]},"faq.update":{"uri":"admin\/faq\/edit","methods":["POST"]},"faq.delete":{"uri":"admin\/faq\/delete","methods":["POST"]},"partner.list":{"uri":"admin\/partner\/list","methods":["GET","HEAD"]},"partner.list.trashed":{"uri":"admin\/partner\/trash","methods":["GET","HEAD"]},"partner.add":{"uri":"admin\/partner\/add","methods":["GET","HEAD"]},"partner.edit":{"uri":"admin\/partner\/edit\/{id}","methods":["GET","HEAD"]},"partner.detail.view":{"uri":"admin\/partner\/detail\/{isTrashed?}","methods":["POST"]},"partner.remove":{"uri":"admin\/partner\/remove","methods":["POST"]},"partner.restore":{"uri":"admin\/partner\/restore\/{id}","methods":["GET","HEAD"]},"partner.status":{"uri":"admin\/partner\/status\/{id}","methods":["POST"]},"partner.store":{"uri":"admin\/partner\/store","methods":["POST"]},"partner.update":{"uri":"admin\/partner\/update","methods":["POST"]},"partner.delete":{"uri":"admin\/partner\/delete","methods":["POST"]},"gallery.list":{"uri":"admin\/gallery\/list","methods":["GET","HEAD"]},"gallery.add":{"uri":"admin\/gallery\/add","methods":["GET","HEAD"]},"gallery.edit":{"uri":"admin\/gallery\/edit\/{id}","methods":["GET","HEAD"]},"gallery.detail.view":{"uri":"admin\/gallery\/detail\/{id?}","methods":["GET","HEAD"]},"gallery.remove":{"uri":"admin\/gallery\/remove","methods":["POST"]},"gallery.destroy":{"uri":"admin\/gallery\/destroy","methods":["POST"]},"gallery.restore":{"uri":"admin\/gallery\/restore","methods":["POST"]},"gallery.update":{"uri":"admin\/gallery\/update","methods":["POST"]},"gallery.status":{"uri":"admin\/gallery\/status\/{id}","methods":["POST"]},"gallery.store":{"uri":"admin\/gallery\/store","methods":["POST"]},"gallery.list.trashed":{"uri":"admin\/gallery\/trash","methods":["GET","HEAD"]},"banner.list":{"uri":"admin\/banner\/list","methods":["GET","HEAD"]},"banner.list.trashed":{"uri":"admin\/banner\/trash","methods":["GET","HEAD"]},"banner.add":{"uri":"admin\/banner\/add","methods":["GET","HEAD"]},"banner.edit":{"uri":"admin\/banner\/edit\/{id}","methods":["GET","HEAD"]},"banner.detail.view":{"uri":"admin\/banner\/detail\/{isTrashed?}","methods":["POST"]},"banner.store":{"uri":"admin\/banner\/store","methods":["POST"]},"banner.update":{"uri":"admin\/banner\/edit","methods":["POST"]},"banner.status":{"uri":"admin\/banner\/status\/{id}","methods":["POST"]},"banner.remove":{"uri":"admin\/banner\/remove","methods":["POST"]},"banner.restore":{"uri":"admin\/banner\/restore\/{id}","methods":["GET","HEAD"]},"banner.delete":{"uri":"admin\/banner\/delete","methods":["POST"]},"role.list":{"uri":"admin\/role\/list","methods":["GET","HEAD"]},"role.list.trashed":{"uri":"admin\/role\/trash","methods":["GET","HEAD"]},"role.add":{"uri":"admin\/role\/add","methods":["GET","HEAD"]},"role.edit":{"uri":"admin\/role\/freshdata","methods":["POST"]},"role.detail.view":{"uri":"admin\/role\/detail\/{isTrashed?}","methods":["POST"]},"role.remove":{"uri":"admin\/role\/remove","methods":["POST"]},"role.restore":{"uri":"admin\/role\/restore\/{id}","methods":["GET","HEAD"]},"role.status":{"uri":"admin\/role\/status\/{id}","methods":["POST"]},"role.store":{"uri":"admin\/role\/store","methods":["POST"]},"role.update":{"uri":"admin\/role\/edit","methods":["POST"]},"role.delete":{"uri":"admin\/role\/delete","methods":["POST"]},"permission.list":{"uri":"admin\/permission\/list","methods":["GET","HEAD"]},"permission.list.trashed":{"uri":"admin\/permission\/trash","methods":["GET","HEAD"]},"permission.add":{"uri":"admin\/permission\/add","methods":["GET","HEAD"]},"permission.edit":{"uri":"admin\/permission\/edit\/{id}","methods":["GET","HEAD"]},"permission.detail.view":{"uri":"admin\/permission\/detail\/{isTrashed?}","methods":["POST"]},"permission.remove":{"uri":"admin\/permission\/remove","methods":["POST"]},"permission.restore":{"uri":"admin\/permission\/restore\/{id}","methods":["GET","HEAD"]},"permission.status":{"uri":"admin\/permission\/status\/{id}","methods":["POST"]},"permission.store":{"uri":"admin\/permission\/store","methods":["POST"]},"permission.update":{"uri":"admin\/permission\/edit","methods":["POST"]},"permission.delete":{"uri":"admin\/permission\/delete","methods":["POST"]},"subscriber.list":{"uri":"admin\/subscriber\/list","methods":["GET","HEAD"]},"subscriber.list.trashed":{"uri":"admin\/subscriber\/trash","methods":["GET","HEAD"]},"subscriber.add":{"uri":"admin\/subscriber\/add","methods":["GET","HEAD"]},"subscriber.edit":{"uri":"admin\/subscriber\/edit\/{id}","methods":["GET","HEAD"]},"subscriber.detail.view":{"uri":"admin\/subscriber\/detail\/{isTrashed?}","methods":["POST"]},"subscriber.remove":{"uri":"admin\/subscriber\/remove","methods":["POST"]},"subscriber.restore":{"uri":"admin\/subscriber\/restore\/{id}","methods":["GET","HEAD"]},"subscriber.status":{"uri":"admin\/subscriber\/status\/{id}","methods":["POST"]},"subscriber.store":{"uri":"admin\/subscriber\/store","methods":["POST"]},"subscriber.update":{"uri":"admin\/subscriber\/update","methods":["POST"]},"subscriber.delete":{"uri":"admin\/subscriber\/delete","methods":["POST"]},"admin-notification.main":{"uri":"admin\/notification\/list","methods":["GET","HEAD"]},"admin-notification.add":{"uri":"admin\/notification\/add","methods":["GET","HEAD"]},"admin-notification.save":{"uri":"admin\/notification\/save","methods":["POST"]},"admin-notification.freshdata":{"uri":"admin\/notification\/fresh","methods":["POST"]},"admin-notification.view":{"uri":"admin\/notification\/view","methods":["POST"]},"admin-notification.update":{"uri":"admin\/notification\/edit","methods":["POST"]},"admin-notification.delete":{"uri":"admin\/notification\/delete","methods":["POST"]},"payment.list":{"uri":"admin\/payment\/list","methods":["GET","HEAD"]},"payment.list.trashed":{"uri":"admin\/payment\/trash","methods":["GET","HEAD"]},"payment.add":{"uri":"admin\/payment\/add","methods":["GET","HEAD"]},"payment.edit":{"uri":"admin\/payment\/edit\/{id}","methods":["GET","HEAD"]},"payment.detail.view":{"uri":"admin\/payment\/detail\/{isTrashed?}","methods":["POST"]},"payment.remove":{"uri":"admin\/payment\/remove","methods":["POST"]},"payment.restore":{"uri":"admin\/payment\/restore\/{id}","methods":["GET","HEAD"]},"payment.status":{"uri":"admin\/payment\/status\/{id}","methods":["POST"]},"payment.store":{"uri":"admin\/payment\/store","methods":["POST"]},"payment.update":{"uri":"admin\/payment\/edit","methods":["POST"]},"payment.delete":{"uri":"admin\/payment\/delete","methods":["POST"]},"customer.list":{"uri":"admin\/customer\/list","methods":["GET","HEAD"]},"customer.add":{"uri":"admin\/customer\/add","methods":["GET","HEAD"]},"customer.edit":{"uri":"admin\/customer\/edit\/{id}","methods":["GET","HEAD"]},"customer.detail.view":{"uri":"admin\/customer\/detail\/{id?}","methods":["GET","HEAD"]},"customer.remove":{"uri":"admin\/customer\/remove","methods":["POST"]},"customer.destroy":{"uri":"admin\/customer\/destroy","methods":["POST"]},"customer.restore":{"uri":"admin\/customer\/restore","methods":["POST"]},"customer.update":{"uri":"admin\/customer\/update","methods":["POST"]},"customer.status":{"uri":"admin\/customer\/status\/{id}","methods":["POST"]},"customer.store":{"uri":"admin\/customer\/store","methods":["POST"]},"customer.list.trashed":{"uri":"admin\/customer\/trash","methods":["GET","HEAD"]},"admin-brand-settings-general-setting":{"uri":"admin\/brand-settings\/general-setting","methods":["GET","HEAD"]},"admin-brand-settings.logos":{"uri":"admin\/brand-settings\/logos","methods":["GET","HEAD"]},"admin-brand-settings.logos-save":{"uri":"admin\/brand-settings\/logos-save","methods":["POST"]},"admin-brand-settings-contact-information-form":{"uri":"admin\/brand-settings\/contact-information","methods":["GET","HEAD"]},"admin-brand-settings.contact-information-save":{"uri":"admin\/brand-settings\/contact-information-save","methods":["POST"]},"admin-brand-settings-social-link-form":{"uri":"admin\/brand-settings\/social-link","methods":["GET","HEAD"]},"admin-brand-settings.social-link-save":{"uri":"admin\/brand-settings\/social-link-save","methods":["POST"]},"admin-brand-settings-custom-header-footer-form":{"uri":"admin\/brand-settings\/custom-header-footer","methods":["GET","HEAD"]},"admin-brand-settings.custom-header-footer-save":{"uri":"admin\/brand-settings\/custom-header-footer-save","methods":["POST"]},"admin-brand-settings-mail-setting-form":{"uri":"admin\/brand-settings\/mail-setting","methods":["GET","HEAD"]},"admin-brand-settings.mailsetting-save":{"uri":"admin\/brand-settings\/mailsetting-save","methods":["POST"]},"admin-brand-settings.mailsetting-update":{"uri":"admin\/brand-settings\/mailsetting-update","methods":["POST"]},"admin-brand-settings.payment-setting-form":{"uri":"admin\/brand-settings\/payment-setting\/add","methods":["GET","HEAD"]},"admin-brand-settings.payment-setting-save":{"uri":"admin\/brand-settings\/payment-setting-save","methods":["POST"]},"admin-brand-settings.payment-setting-default-save":{"uri":"admin\/brand-settings\/payment-setting-default-save","methods":["POST"]},"admin-brand-settings.payment-gateway-setting":{"uri":"admin\/brand-settings\/payment-gateway-setting","methods":["POST"]},"coupon.list":{"uri":"admin\/coupon\/list","methods":["GET","HEAD"]},"coupon.add":{"uri":"admin\/coupon\/add","methods":["GET","HEAD"]},"coupon.edit":{"uri":"admin\/coupon\/edit\/{id}","methods":["GET","HEAD"]},"coupon.detail.view":{"uri":"admin\/coupon\/detail\/{id?}","methods":["GET","HEAD"]},"coupon.remove":{"uri":"admin\/coupon\/remove","methods":["POST"]},"coupon.destroy":{"uri":"admin\/coupon\/destroy","methods":["POST"]},"coupon.restore":{"uri":"admin\/coupon\/restore","methods":["POST"]},"coupon.update":{"uri":"admin\/coupon\/update","methods":["POST"]},"coupon.status":{"uri":"admin\/coupon\/status\/{id}","methods":["POST"]},"coupon.store":{"uri":"admin\/coupon\/store","methods":["POST"]},"coupon.list.trashed":{"uri":"admin\/coupon\/trash","methods":["GET","HEAD"]},"payment-link-generator.list":{"uri":"admin\/payment-link-generator\/list","methods":["GET","HEAD"]},"payment-link-generator.list.trashed":{"uri":"admin\/payment-link-generator\/trash","methods":["GET","HEAD"]},"payment-link-generator.add":{"uri":"admin\/payment-link-generator\/add","methods":["GET","HEAD"]},"payment-link-generator.edit":{"uri":"admin\/payment-link-generator\/edit\/{id}","methods":["GET","HEAD"]},"payment-link-generator.detail.view":{"uri":"admin\/payment-link-generator\/detail\/{isTrashed?}","methods":["POST"]},"payment-link-generator.remove":{"uri":"admin\/payment-link-generator\/remove","methods":["POST"]},"payment-link-generator.restore":{"uri":"admin\/payment-link-generator\/restore\/{id}","methods":["GET","HEAD"]},"payment-link-generator.status":{"uri":"admin\/payment-link-generator\/status\/{id}","methods":["POST"]},"payment-link-generator.store":{"uri":"admin\/payment-link-generator\/store","methods":["POST"]},"payment-link-generator.update":{"uri":"admin\/payment-link-generator\/edit","methods":["POST"]},"payment-link-generator.delete":{"uri":"admin\/payment-link-generator\/delete","methods":["POST"]},"emailtemplate.list":{"uri":"admin\/email\/list","methods":["GET","HEAD"]},"emailtemplate.add":{"uri":"admin\/email\/add","methods":["GET","HEAD"]},"emailtemplate.edit":{"uri":"admin\/email\/edit\/{id}","methods":["GET","HEAD"]},"emailtemplate.detail.view":{"uri":"admin\/email\/detail\/{id?}","methods":["GET","HEAD"]},"emailtemplate.remove":{"uri":"admin\/email\/remove","methods":["POST"]},"emailtemplate.destroy":{"uri":"admin\/email\/destroy","methods":["POST"]},"emailtemplate.restore":{"uri":"admin\/email\/restore","methods":["POST"]},"emailtemplate.update":{"uri":"admin\/email\/update","methods":["POST"]},"emailtemplate.status":{"uri":"admin\/email\/status\/{id}","methods":["POST"]},"emailtemplate.store":{"uri":"admin\/email\/store","methods":["POST"]},"emailtemplate.list.trashed":{"uri":"admin\/email\/trash","methods":["GET","HEAD"]},"payment.stripe":{"uri":"admin\/payment\/stripe","methods":["GET","HEAD"]},"payment.stripe.paymentIntent":{"uri":"admin\/payment\/stripe\/paymentIntent","methods":["POST"]},"payment.stripe.paymentIntent_3d":{"uri":"admin\/payment\/stripe\/paymentIntent_3d","methods":["POST"]},"payment.stripe.three_step":{"uri":"admin\/payment\/stripe\/three_step","methods":["POST"]},"payment.stripe.success":{"uri":"admin\/payment\/stripe\/success","methods":["GET","HEAD"]},"payment.stripe.createPaymentMethod":{"uri":"admin\/payment\/stripe\/createPaymentMethod","methods":["GET","HEAD","POST","PUT","PATCH","DELETE","OPTIONS"]},"payment.stripe.process":{"uri":"admin\/payment\/stripe\/process","methods":["POST"]},"payment.failed":{"uri":"admin\/payment\/failed","methods":["GET","HEAD"]},"payment.expired":{"uri":"admin\/payment\/expired","methods":["GET","HEAD"]},"payment.sendInvoice":{"uri":"admin\/payment\/sendInvoice","methods":["GET","HEAD","POST","PUT","PATCH","DELETE","OPTIONS"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };