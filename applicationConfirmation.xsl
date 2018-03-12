<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:fo="http://www.w3.org/1999/XSL/Format" version="1.0">
	<xsl:param name="eventIdParam">
		<!-- Content:template -->
	</xsl:param>

	<xsl:param name="participantIdParam">
		<!-- Content:template -->
	</xsl:param>

	<xsl:variable name="participant"
		select="document('data/applications.xml')/participants/participant[@id=$participantIdParam]"></xsl:variable>


	<xsl:template match="events">
		<fo:root>
			<fo:layout-master-set>
				<fo:simple-page-master master-name="application_confirmation"
					page-height="29.7cm" page-width="21cm" margin-top="1cm"
					margin-bottom="2cm" margin-left="2.5cm" margin-right="2.5cm">
					<fo:region-body margin-top="1cm" />
					<fo:region-before extent="2cm" />
					<fo:region-after extent="3cm" />
				</fo:simple-page-master>
			</fo:layout-master-set>
			<fo:page-sequence master-reference="application_confirmation">
				<fo:flow flow-name="xsl-region-body">
					<fo:block font-size="19pt" font-family="sans-serif"
						line-height="24pt" space-after.optimum="20pt" background-color="#353837"
						color="white" text-align="center" padding-top="5pt"
						padding-bottom="5pt">Anmeldebestätigung</fo:block>
					<!-- For each event ... -->
					<xsl:apply-templates select="/events/event[@id=$eventIdParam]" />
				</fo:flow>
			</fo:page-sequence>
		</fo:root>
	</xsl:template>

	<xsl:template match="event">

		<!-- Adressheader -->
		<fo:block color="black">
			<xsl:apply-templates select="participants" />
		</fo:block>

		<fo:block linefeed-treatment="preserve">
			<xsl:text>&#xA;</xsl:text>
			<xsl:text>&#xA;</xsl:text>
		</fo:block>

		<fo:block font-size="19pt" font-weight="bold" font-family="sans-serif"
			line-height="24pt" space-after.optimum="20pt" text-align="left">
			<xsl:value-of select="name" />
		</fo:block>

		<fo:block font-weight="bold">Liebe Teilnehmerin, Lieber Teilnehmer
		</fo:block>


		<fo:block>
			Wir bestätigen dir hiermit gerne deine Anmeldung.
			Nachfolgend findest du alle Informationen zu der Verantstaltung:
		</fo:block>

		<fo:block linefeed-treatment="preserve">
			<xsl:text>&#xA;</xsl:text>
		</fo:block>
		<fo:block>
			Datum Begin:
			<xsl:value-of select="date_beginning" />
		</fo:block>
		<fo:block>
			Datum Ende:
			<xsl:value-of select="date_end" />
		</fo:block>
		<fo:block>
			Ort:
			<xsl:value-of select="location" />
		</fo:block>
		<fo:block>
			Gebühren:
			<xsl:value-of select="participation_fee" />
		</fo:block>
		<fo:block>
			Maximal Teilnehmer:
			<xsl:value-of select="max_participants" />
		</fo:block>
				<fo:block linefeed-treatment="preserve">
			<xsl:text>&#xA;</xsl:text>
		</fo:block>
		<fo:block color="black"  font-weight="bold">
				Personalien
		</fo:block>
		<fo:block color="black">
			<xsl:value-of select="$participant/prename" />
			<xsl:value-of select="concat(' ',$participant/name)" />
		</fo:block>
		<fo:block color="black">
		<xsl:value-of select="$participant/street" />
		</fo:block>

		<fo:block white-space-collapse="false">
			<xsl:value-of select="$participant/zipcode" />
			<xsl:value-of select="concat(' ',$participant/city)" />
		</fo:block>
		<fo:block white-space-collapse="false">
			<xsl:value-of select="$participant/phonenumber" />
		</fo:block>
		<fo:block white-space-collapse="false">
			<xsl:value-of select="$participant/email" />
		</fo:block>
		<fo:block linefeed-treatment="preserve">
			<xsl:text>&#xA;</xsl:text>
		</fo:block>

		<fo:block>Wir freuen uns auf eine tolle Zeit mit dir. 
			Zögere bei Fragen nicht, dich direkt bei uns zu melden.</fo:block>

		<fo:block linefeed-treatment="preserve">
			<xsl:text>&#xA;</xsl:text>
		</fo:block>

		<fo:block>Liebe Grüsse</fo:block>
		<fo:block>Dein Veranstaltungsteam</fo:block>

		<fo:block linefeed-treatment="preserve">
			<xsl:text>&#xA;</xsl:text>
		</fo:block>

		<fo:block>XML Sporthalle</fo:block>
		<fo:block>Speichermatte 42</fo:block>
		<fo:block>4004 Basel</fo:block>

		<fo:block>Email: info@xml-sporthalle.ch</fo:block>
		<fo:block>Telefon: 041 420 12 34</fo:block>



	</xsl:template>



</xsl:transform>


