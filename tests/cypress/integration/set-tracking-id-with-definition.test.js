describe("Set tracking ID with wp-config definition", () => {
  before(() => {
    cy.login();
    cy.wpCli(
      "config set TRACKING_CODE_FOR_LINKEDIN_INSIGHTS_TAG_ID definition --add --raw"
    );
  });

  it("Is input field disabled?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_linkedin_insights_tag").should("be.disabled");
  });

  it("Does input field contain the defined value?", () => {
    cy.visit("/wp-admin/options-general.php");
    cy.get("#tracking_code_for_linkedin_insights_tag")
      .invoke("val")
      .should("eq", "definition");
  });

  it("Is tracking code printed to the page?", () => {
    cy.logout();
    cy.visit("/");
    cy.document().then((doc) => {
      const html = doc.documentElement.innerHTML;
      expect(html).to.contain('_linkedin_partner_id = "definition"');
    });
  });

  after(() => {
    cy.wpCli("config delete TRACKING_CODE_FOR_LINKEDIN_INSIGHTS_TAG_ID");
  });
});
