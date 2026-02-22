describe("Set tracking ID with PHP filter", () => {
  before(() => {
    cy.login();
    cy.activatePlugin("filter");
  });

  it("Is input field disabled?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_linkedin_insights_tag").should("be.disabled");
  });

  it("Does input field contain the filtered value?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_linkedin_insights_tag")
      .invoke("val")
      .should("eq", "filter");
  });

  it("Is tracking code printed to the page?", () => {
    cy.logout();
    cy.visit("/");
    cy.document().then((doc) => {
      const html = doc.documentElement.innerHTML;
      expect(html).to.contain('_linkedin_partner_id = "filter"');
    });
  });

  after(() => {
    cy.login();
    cy.deactivatePlugin("filter");
  });
});
